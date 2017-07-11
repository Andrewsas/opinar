use projeto_bd;

-- lista todos itens                
delimiter ##
create procedure sp_exibeitens(pitmnome varchar(45))
begin
	declare vpesquisa varchar(48) default '';
    
    set vpesquisa = concat('%',pitmnome,'%');
    	
	select itmcodigo 'CODIGO', itmnome 'NOME',catnome 'CATEGORIA', locnome 'ESTADO', locmapa 'MAPA', itmdescricao 'DESCRICAO', catimg 'IMAGEM', itmstatus 'STATUS'
	from item
	inner join categoria on catcodigo = itmcatcodigo
	inner join local on loccodigo = itmloccodigo
	where itmnome like vpesquisa;
end##
delimiter ;



-- cadastra item

delimiter ##
create procedure sp_cadastraitem(pitmusucodigo int, pitmcatcodigo int, pitmloccodigo int, pitmnome varchar(45), pitmdescricao varchar(900))
begin
	declare vitem boolean default 0;
    declare vcategoria boolean default 0;
    declare vusuario boolean default 0;
    declare vmsg varchar(100) default '';
    declare vlocal boolean default 0;

	set vlocal = (select count(*) from local where loccodigo = pitmloccodigo);
	set vusuario = (select count(*) from usuario where usucodigo = pitmusucodigo);
    set vitem = (select count(*) from item where itmnome = pitmnome);
    set vcategoria = (select count(*) from categoria where catcodigo = pitmcatcodigo);
    
    
    if pitmnome = '' and pitmdescricao = '' then
		set vmsg = 'Insirar valores validos para realizar cadastro de um novo Item.';
    else
		if vitem then
			set vmsg = 'Item ja se encontrar cadastrado no Sistema.';
		else
			if vusuario then 
				if vlocal  then
					if vcategoria then
						insert into item values(null,pitmusucodigo,pitmcatcodigo, pitmloccodigo, pitmnome, pitmdescricao, current_date(),1);
						set vmsg = 'Novo Item cadastrado com sucesso.';
					else 
						set vmsg = 'Selecione uma categoria valida.';
					end if;
				else 
					set vmsg = 'Selecione um local valido.';
				end if;
			else
				set vmsg = 'Usuario não encontrado no sistema.';
			end if;
		end if;
	end if;
    if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;
               
             
-- desativa item

delimiter ##
create procedure sp_desativaitem(pitmcodigo int)
begin
	declare vitem boolean default 0;
    declare vmsg varchar (100) default '';
    
    set vitem = (select count(*) from item where itmcodigo = pitmcodigo);
    
    if vitem then
		update item 
        set itmstatus = 0
        where itmcodigo = pitmcodigo;
	
		set vmsg = 'Item desativado com Sucesso.';
	else	
		set vmsg = 'Item não encontrado no Sistema.';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;

-- ativa item

delimiter ##
create procedure sp_ativaitem(pitmcodigo int)
begin
	declare vitem boolean default 0;
    declare vmsg varchar (100) default '';
    
    set vitem = (select count(*) from item where itmcodigo = pitmcodigo);
    
    if vitem then
		update item 
        set itmstatus = 1
        where itmcodigo = pitmcodigo;
	
		set vmsg = 'Item ativado com Sucesso.';
	else	
		set vmsg = 'Item não encontrado no Sistema.';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;


-- deletar item

delimiter ##
create procedure sp_deletaitem(pitmcodigo int)
begin
	declare vitem boolean default 0;
    declare vmsg varchar (100) default '';
    
    set vitem = (select count(*) from item where itmcodigo = pitmcodigo);
    
    if vitem then
		delete from item where itmcodigo = pitmcodigo;
	
		set vmsg = 'Item excluido com Sucesso.';
	else	
		set vmsg = 'Item não encontrado no Sistema.';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;


-- carrega item


delimiter ##
create procedure sp_carregaitem(pitmcodigo int)
begin
	declare vitem boolean default 0;
    declare vmsg varchar (100) default '';
    
    set vitem = (select count(*) from item where itmcodigo = pitmcodigo);
    
    if vitem then
		select itmcodigo 'CODIGO', itmnome 'NOME', catnome 'CATEGORIA', locnome 'ESTADO', itmdescricao 'DESCRICAO', catimg 'IMAGEM'
		from item
		inner join categoria on catcodigo = itmcatcodigo
		left join local on loccodigo = itmloccodigo
		where itmcodigo = pitmcodigo;
	else	
		set vmsg = 'Item não encontrado no Sistema.';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;

-- bucar itens

delimiter ##
create procedure sp_buscaitem(ppesquisa varchar(45))
begin
	declare vpesquisa varchar(50) default '';
    declare vpesquisadescricao boolean default 0;
    
    set vpesquisa = concat('%',ppesquisa,'%');
    set vpesquisadescricao = (select count(*) from item
								inner join categoria on catcodigo = itmcatcodigo
                                where itmnome like vpesquisa or catnome like vpesquisa);
	
    if vpesquisadescricao then
		select itmcodigo 'CODIGO', itmnome 'NOME',catnome 'CATEGORIA', locnome 'ESTADO', locmapa 'MAPA', itmdescricao 'DESCRICAO', catimg 'IMAGEM', itmstatus 'STATUS'
        from item
		inner join categoria on catcodigo = itmcatcodigo
        left join local on loccodigo = itmloccodigo
        where itmnome like vpesquisa or catnome like vpesquisa;
	else
		select itmcodigo 'CODIGO', itmnome 'NOME',catnome 'CATEGORIA', locnome 'ESTADO', locmapa 'MAPA', itmdescricao 'DESCRICAO', catimg 'IMAGEM', itmstatus 'STATUS'
        from item
		inner join categoria on catcodigo = itmcatcodigo
        left join local on loccodigo = itmloccodigo
        where itmdescricao like vpesquisa;
	end if;
end##
delimiter ;


-- edita item
delimiter ##
create procedure sp_editaitem(pitmcodigo int, pitmusucodigo int, pitmcatcodigo int, pitmloccodigo int, pitmnome varchar(45), pitmdescricao varchar(900))
begin
	declare vitem boolean default 0;
    declare vcategoria boolean default 0;
    declare vusuario boolean default 0;
    declare vlocal boolean default 0;
    declare vmsg varchar(100) default '';
    

	set vusuario = (select count(*) from usuario where usucodigo = pitmusucodigo);
	set vlocal = (select count(*) from local where loccodigo = pitmloccodigo);
    set vitem = (select count(*) from item where itmcodigo = pitmcodigo);
    set vcategoria = (select count(*) from categoria where catcodigo = pitmcatcodigo);
    
    
    if pitmnome = '' and pitmdescricao = '' then
		set vmsg = 'Insirar valores validos para editar Item.';
    else
		if not vitem then
			set vmsg = 'Item não se encontrar cadastrado no Sistema.';
		else
			if vusuario then 
				if vlocal then			
					if vcategoria then
						update item
						set itmusucodigo =  pitmusucodigo, itmcatcodigo = pitmcatcodigo, itmloccodigo = pitmloccodigo, itmnome = pitmnome, itmdescricao =  pitmdescricao, itmdata = current_date()
						where itmcodigo = pitmcodigo;
						
						set vmsg = 'Item atualizado com sucesso.';
					else 
						set vmsg = 'Selecione uma categoria valida.';
					end if;
				else 
						set vmsg = 'Selecione um local valido.';
					end if;
			else
				set vmsg = 'Usuario não encontrado no sistema.';
			end if;
		end if;
	end if;
    if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;

