use projeto_bd;

-- Exibe todos os usuarios
delimiter ##
create procedure sp_exibeusuarios(pusunickname varchar(45))
begin
	declare vpesquisa varchar(49) default '';
    set vpesquisa = concat('%',pusunickname,'%');
    
	select usucodigo 'CODIGO', usunickname 'NICK', usuemail 'EMAIL', usustatus 'STATUS'
    from usuario
    where usunickname like vpesquisa
    order by usucodigo;
end##
delimiter ;

 -- cadastro de usuario

delimiter ##
create procedure sp_cadastrausuario(pusuemail varchar(80), pusunickname varchar(45), pusutipcodigo int, pususenha varchar(45))
begin
    declare vmsg varchar(100) default '';
    declare vemail boolean default 0;
	declare vusunickname boolean default 0;
	declare vtipo boolean default 0;
    
    if pusuemail = '' or pusunickname = '' or pususenha = '' then
		set vmsg = 'Insirar um valor valido para realizar cadastro.';
	else         
		
		set vusunickname = (select count(*) from usuario where usunickname = pusunickname);
		set vemail = (select count(*) from usuario where usuemail = pusuemail);
		set vtipo = (select count(*) from tipo_usuario where tipcodigo = pusutipcodigo);
		
		if vemail and  vusunickname then
			set vmsg = 'Usuario ja se encontra Cadastrado em nosso sistema.';
		else if vemail then
			set vmsg = 'Email ja se encontra Cadastrado em nosso sistema.';
		else if vusunickname  then
			set vmsg = 'Nickname ja se encontra Cadastrado em nosso sistema.';
		else if not vtipo then
			set vmsg = 'Tipo de usuario invalido.';
		else 
			insert into usuario values (null, pusuemail, pusunickname, pusutipcodigo, password(pususenha),1);
			set vmsg = 'Novo cadastro de usuario realizado com sucesso.';
		end if;
		end if;
		end if;
		end if;
    end if;
    select vmsg 'RESULT';
end##
delimiter ;


-- login

delimiter ##
create procedure sp_login(pusuario varchar(80), pususenha varchar(45))
begin
	declare vusucodigo int default 0;
    declare vusuario boolean default 0;
    declare vmsg varchar(100) default '';
    
    if pusuario = '' or pususenha = '' then
		set vmsg = 'Insirar um valor valido para realizar Login.';
	else
		set vusucodigo = (select usucodigo from usuario where usuemail = pusuario or usunickname = pusuario);
        
        if vusucodigo then
			set vusuario = (select count(*) from usuario where usucodigo = vusucodigo and ususenha = password(pususenha));
			
            if vusuario then
				select usucodigo 'CODIGO', usuemail 'EMAIL', usunickname 'NICK', usutipcodigo 'TIPO' ,'Usuario logado com exito.' RESULT
                from usuario
                where usucodigo = vusucodigo;
                
			else 
				set vmsg = 'Dados invalidos, tente novamente.';
			end if;
		else 
			set vmsg = 'Usuario não encontrado no Sistema.';
		end if;
	end if;
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;

-- desativar usuario

delimiter ##
create procedure sp_desativausuario (pusucodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vusuario boolean default 0;
    
    set vusuario = (select count(*) from usuario where usucodigo = pusucodigo);
    
    if vusuario then
		
        update usuario
		set usustatus = 0
        where usucodigo = pusucodigo;
        
        set vmsg = 'Status de Usuario desativado com sucesso.';
	else 
		set vmsg = 'Usuario não encontrado no Sistema.';
	end if;
    select vmsg 'RESULT';
end##
delimiter ;


-- ativa usuario

delimiter ##
create procedure sp_ativausuario (pusucodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vusuario boolean default 0;
    
    set vusuario = (select count(*) from usuario where usucodigo = pusucodigo);
    
    if vusuario then
		
        update usuario
		set usustatus = 1
        where usucodigo = pusucodigo;
        
        set vmsg = 'Status de Usuario ativado com sucesso.';
	else 
		set vmsg = 'Usuario não encontrado no Sistema.';
	end if;
    select vmsg 'RESULT';
end##
delimiter ;

-- deletar usuario

delimiter ##
create procedure sp_deletausuario (pusucodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vusuario boolean default 0;
    
    set vusuario = (select count(*) from usuario where usucodigo = pusucodigo);
    
    if vusuario then
		
        delete from usuario where usucodigo = pusucodigo;
        
        set vmsg = 'Usuario excluido com exito.';
	else 
		set vmsg = 'Usuario não encontrado no Sistema.';
	end if;
    select vmsg 'RESULT';
end##
delimiter ;

-- carrega usuario

delimiter ##
create procedure sp_carregausuario (pusucodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vusuario boolean default 0;
    
    set vusuario = (select count(*) from usuario where usucodigo = pusucodigo);
    
    if vusuario then
		
        select usucodigo 'CODIGO', usuemail 'EMAIL', usunickname 'NICK', ususenha 'SENHA', usutipcodigo 'TIPO','Usuario carregado com exito' as RESULT
        from usuario 
		where usucodigo = pusucodigo;
	else 
		set vmsg = 'Usuario não encontrado no Sistema.';
	end if;
   
   if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;

-- edita usuario

delimiter ##
create procedure sp_editausuario(pusucodigo int, pusuemail varchar(80), pusunickname varchar(45), pusutipcodigo int, pususenha varchar(45))
begin
    declare vmsg varchar(100) default '';
    declare vemail boolean default 0;
    declare vusuario boolean default 0;
	declare vusunickname boolean default 0;
	declare vtipo boolean default 0;
    
    set vusuario = (select count(*) from usuario where usucodigo = pusucodigo);
    
    if vusuario then
    
		if pusuemail = '' or pusunickname = '' or pususenha = '' then
			set vmsg = 'Insirar um valor valido para realizar atualização do cadastro.';
		else         
			
			set vusunickname = (select count(*) from usuario where usunickname = pusunickname and usucodigo <> pusucodigo);
			set vemail = (select count(*) from usuario where usuemail = pusuemail and usucodigo <> pusucodigo);
			set vtipo = (select count(*) from tipo_usuario where tipcodigo = pusutipcodigo);
			
			if vemail and  vusunickname then
				set vmsg = 'Usuario ja se encontra Cadastrado em nosso sistema.';
			else if vemail then
				set vmsg = 'Email ja se encontra Cadastrado em nosso sistema.';
			else if vusunickname  then
				set vmsg = 'Nickname ja se encontra Cadastrado em nosso sistema.';
			else if not vtipo then
				set vmsg = 'Tipo de usuario invalido.';
			else 
				update usuario 
                set usuemail = pusuemail, usunickname = pusunickname, usutipcodigo = pusutipcodigo, ususenha = password(pususenha)
                where usucodigo = pusucodigo;
                
				set vmsg = 'Cadastro de usuario atualizado com sucesso.';
			end if;
			end if;
			end if;
			end if;
		end if;
	else
		set vmsg = 'Usuario não encontrado no Sistema.';
    end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;