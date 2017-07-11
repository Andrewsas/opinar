use projeto_bd;

-- gostou item

delimiter ##
create procedure sp_gostouitem(pava_itmusucodigo int, pava_itmitmcodigo int)
begin
	declare vusuario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vgostou boolean default 0;
    declare vnaogostou boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuario = (select count(*) from usuario where usucodigo = pava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_itmitmcodigo);
    
	if vusuario then
		if vitem then
			set vavaliacao = (select count(*) from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
			
			if vavaliacao then
				set vgostou = (select ava_itmgostou from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
				set vnaogostou = (select ava_itmnaogostou from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
				
				if vgostou then
					update avalia_item
					set ava_itmgostou = 0
					where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
						
					set vmsg = 'Avaliação desativada com Sucesso.';
													
					else if vnaogostou then
						update avalia_item
						set ava_itmgostou = 1, ava_itmnaogostou = 0
						where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
						
						set vmsg = 'Avaliação alterada com Sucesso.';
						
						else
							update avalia_item
							set ava_itmgostou = 1
							where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
								
							set vmsg = 'Avaliação ativada com Sucesso.';
						
						
					end if;
				end if;                    
			else
				insert into avalia_item values(pava_itmusucodigo, pava_itmitmcodigo,1,0,0,'');
				set vmsg = 'Avaliação cadastrada com Sucesso.';
				
			end if;
		else 
			set vmsg = 'Item não encontrado on Sistema.';
		end if;
	else
		set vmsg = 'Usuario não encontrado on Sistema.';
	end if;
	select vmsg 'RESULT';
end##
delimiter ;


-- nao gostou item

delimiter ##
create procedure sp_naogostouitem(pava_itmusucodigo int, pava_itmitmcodigo int)
begin
	declare vusuario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vgostou boolean default 0;
    declare vnaogostou boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuario = (select count(*) from usuario where usucodigo = pava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_itmitmcodigo);
    
	if vusuario then
		if vitem then
			set vavaliacao = (select count(*) from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
			
			if vavaliacao then
				set vgostou = (select ava_itmgostou from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
				set vnaogostou = (select ava_itmnaogostou from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
				
				if vnaogostou then
					update avalia_item
					set ava_itmnaogostou = 0 
					where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
						
					set vmsg = 'Avaliação desativada com Sucesso.';
											
					else if vgostou then
						update avalia_item
						set ava_itmgostou = 0, ava_itmnaogostou = 1
						where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
						
						set vmsg = 'Avaliação alterada com Sucesso.';

						else
							update avalia_item
							set ava_itmnaogostou = 1
							where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
								
							set vmsg = 'Avaliação ativada com Sucesso.';
						
						
					end if;
				end if;                    
			else
				insert into avalia_item values(pava_itmusucodigo, pava_itmitmcodigo,0,1,0,'');
				set vmsg = 'Avaliação cadastrada com Sucesso.';
				
			end if;
		else 
			set vmsg = 'Item não encontrado on Sistema.';
		end if;
	else
		set vmsg = 'Usuario não encontrado on Sistema.';
	end if;
	select vmsg 'RESULT';
end##
delimiter ;

-- denuncia

delimiter ##
create procedure sp_denunciaitem(pava_itmusucodigo int, pava_itmitmcodigo int)
begin
	declare vusuario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vdenucia boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuario = (select count(*) from usuario where usucodigo = pava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_itmitmcodigo);
    
	if vusuario then
		if vitem then
			set vavaliacao = (select count(*) from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
				if vavaliacao then
					 set vdenucia = (select ava_itmspan from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);

					if vdenucia then
						update avalia_item
						set ava_itmspan = 0 
						where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
							
						set vmsg = 'Avaliação desativada com Sucesso.';
					else
						update avalia_item
						set ava_itmspan = 1 
						where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
							
						set vmsg = 'Avaliação ativada com Sucesso.';
					end if;
				else
					insert into avalia_item values(pava_itmusucodigo, pava_itmitmcodigo,0,0,1,'');
					set vmsg = 'Avaliação cadastrada com Sucesso.';
				end if;
		else 
			set vmsg = 'Item não encontrado on Sistema.';
		end if;
	else
		set vmsg = 'Usuario não encontrado on Sistema.';
	end if;
    select vmsg 'RESULT';
end##
delimiter ;
    
    
-- carrega comentarios

delimiter ##
create procedure sp_carregacomentario(pava_itmitmcodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vavaliacao boolean default 0;
    
    set vavaliacao = (select count(*) from avalia_item where ava_itmitmcodigo = pava_itmitmcodigo);
	
    if vavaliacao then
		select usucodigo 'CODIGO_USUARIO',usunickname 'NICK', ava_itmcomentario 'COMENTARIO' , count(*) 'TOTAL_COMENTARIO'
        from avalia_item
        inner join usuario on ava_itmusucodigo = usucodigo
        where ava_itmitmcodigo = pava_itmitmcodigo;
	else 
		set vmsg = 'Não foram encontrados comentarios para esse item';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;


-- cadastra comentario

delimiter ##
create procedure sp_cadastracomentario(pava_itmitmcodigo int, pava_itmusucodigo int, pava_itmcomentario varchar(150))
begin
	declare vusuario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuario = (select count(*) from usuario where usucodigo = pava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_itmitmcodigo);
    
	if vusuario then
		if vitem then
			set vavaliacao = (select count(*) from avalia_item where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo);
			
			if vavaliacao then
				
				update avalia_item
				set ava_itmcomentario = pava_itmcomentario
				where ava_itmusucodigo  = pava_itmusucodigo and ava_itmitmcodigo = pava_itmitmcodigo;
					
				set vmsg = 'Comentario Atualizado com Sucesso.';
				
			else
				insert into avalia_item values(pava_itmusucodigo, pava_itmitmcodigo,0,0,0,pava_itmcomentario);
				set vmsg = 'Cometario cadastrada com Sucesso.';
				
			end if;
		else 
			set vmsg = 'Item não encontrado no Sistema.';
		end if;
	else
		set vmsg = 'Usuario não encontrado no Sistema.';
	end if;
	select vmsg 'RESULT';
end##
delimiter ;
