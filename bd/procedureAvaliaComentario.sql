

-- gostou comentario

delimiter ##
create procedure sp_gostoucomentario(pava_comusucodigo int, pava_comava_itmitmcodigo int, pava_comava_itmusucodigo int)
begin
	declare vusuarioitem boolean default 0;
    declare vusuariocomentario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vgostou boolean default 0;
    declare vnaogostou boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuariocomentario = (select count(*) from usuario where usucodigo = pava_comusucodigo);
    set vusuarioitem = (select count(*) from usuario where usucodigo = pava_comava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_comava_itmitmcodigo);
    
    if vusuarioitem then
		if vusuariocomentario then
			if vitem then
				set vavaliacao = (select count(*) from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = ava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
				
				if vavaliacao then
					set vgostou = (select ava_comgostou from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
					set vnaogostou = (select ava_comnaogostou from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
					
					if vgostou then
						update avalia_comentario
						set ava_comgostou = 0
						where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
							
						set vmsg = 'Avaliação desativada com Sucesso.';
														
						else if vnaogostou then
							update avalia_comentario
							set ava_comgostou = 1, ava_comnaogostou = 0
							where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
							
							set vmsg = 'Avaliação alterada com Sucesso.';
							
							else
								update avalia_comentario
								set ava_comgostou = 1
								where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
									
								set vmsg = 'Avaliação ativada com Sucesso.';
							
						end if;
					end if;                    
				else
					insert into avalia_comentario values(pava_comusucodigo, pava_comava_itmusucodigo, pava_comava_itmitmcodigo,1,0,0);
					set vmsg = 'Avaliação cadastrada com Sucesso.';
					
				end if;
			else 
				set vmsg = 'Item não encontrado on Sistema.';
			end if;
		else
			set vmsg = 'Usuario do comentario não encontrado on Sistema.';
		end if;
	else
			set vmsg = 'Usuario do item não encontrado on Sistema.';
		end if;
	select vmsg 'RESULT';
end##
delimiter ;


-- não gostou comnetario 


delimiter ##
create procedure sp_naogostoucomentario(pava_comusucodigo int, pava_comava_itmitmcodigo int, pava_comava_itmusucodigo int)
begin
	declare vusuarioitem boolean default 0;
    declare vusuariocomentario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vgostou boolean default 0;
    declare vnaogostou boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuariocomentario = (select count(*) from usuario where usucodigo = pava_comusucodigo);
    set vusuarioitem = (select count(*) from usuario where usucodigo = pava_comava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_comava_itmitmcodigo);
    
    if vusuarioitem then
		if vusuariocomentario then
			if vitem then
				set vavaliacao = (select count(*) from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = ava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
				
				if vavaliacao then
					set vgostou = (select ava_comgostou from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
					set vnaogostou = (select ava_comnaogostou from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
					
					if vnaogostou then
						update avalia_comentario
						set ava_comnaogostou = 0
						where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
							
						set vmsg = 'Avaliação desativada com Sucesso.';
														
						else if vgostou then
							update avalia_comentario
							set ava_comnaogostou = 1, ava_comgostou = 0
							where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
							
							set vmsg = 'Avaliação alterada com Sucesso.';
							
							else
								update avalia_comentario
								set ava_comnaogostou = 1
								where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
									
								set vmsg = 'Avaliação ativada com Sucesso.';
							
						end if;
					end if;                    
				else
					insert into avalia_comentario values(pava_comusucodigo, pava_comava_itmusucodigo, pava_comava_itmitmcodigo,0,1,0);
					set vmsg = 'Avaliação cadastrada com Sucesso.';
					
				end if;
			else 
				set vmsg = 'Item não encontrado on Sistema.';
			end if;
		else
			set vmsg = 'Usuario do comentario não encontrado on Sistema.';
		end if;
	else
			set vmsg = 'Usuario do item não encontrado on Sistema.';
		end if;
	select vmsg 'RESULT';
end##
delimiter ;




-- denuncia comnetario 

delimiter ##
create procedure sp_denunciaomentario(pava_comusucodigo int, pava_comava_itmitmcodigo int, pava_comava_itmusucodigo int)
begin
	declare vusuarioitem boolean default 0;
    declare vusuariocomentario boolean default 0;
    declare vitem boolean default 0;
    declare vavaliacao boolean default 0;
    declare vdenuncia boolean default 0;
    declare vmsg varchar(100) default '';
    
    set vusuariocomentario = (select count(*) from usuario where usucodigo = pava_comusucodigo);
    set vusuarioitem = (select count(*) from usuario where usucodigo = pava_comava_itmusucodigo);
    set vitem = (select count(*) from item where itmcodigo = pava_comava_itmitmcodigo);
    
    if vusuarioitem then
		if vusuariocomentario then
			if vitem then
				set vavaliacao = (select count(*) from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = ava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
				
				if vavaliacao then
					set vdenuncia = (select ava_comspan from avalia_comentario where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo);
					
					if vdenuncia then
						update avalia_comentario
						set ava_comspan = 0 
						where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
						
						set vmsg = 'Avaliação desativada com Sucesso.';
						
					else
						update avalia_comentario
						set ava_comspan = 1
						where ava_comusucodigo = pava_comusucodigo and ava_comava_itmitmcodigo = pava_comava_itmitmcodigo and ava_comava_itmusucodigo = pava_comava_itmusucodigo;
							
						set vmsg = 'Avaliação ativada com Sucesso.';
						
					end if;
                    
				else
					insert into avalia_comentario values(pava_comusucodigo, pava_comava_itmusucodigo, pava_comava_itmitmcodigo,0,0,1);
					set vmsg = 'Avaliação cadastrada com Sucesso.';
					
				end if;
			else 
				set vmsg = 'Item não encontrado on Sistema.';
			end if;
		else
			set vmsg = 'Usuario do comentario não encontrado on Sistema.';
		end if;
	else
			set vmsg = 'Usuario do item não encontrado on Sistema.';
		end if;
	select vmsg 'RESULT';
end##
delimiter ;

