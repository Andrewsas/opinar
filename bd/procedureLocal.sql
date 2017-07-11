use projeto_bd;


-- cadastra procedure
delimiter ##
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastralocal`(plocnome varchar(45), plocmapa varchar(80))
begin
	declare vmsg varchar(100) default '';
        
	if plocnome <> '' or plocmapa <> '' then
		insert into local values(null,plocnome, plocmapa);
        set vmsg = 'Local cadastrado com sucesso.';
	else
		set vmsg = 'Insirar valores valido para cadastra um novo local.';
	end if;
    
    if vmsg <> '' then
		select vmsg 'RESULT';
	end if;
end##
delimiter ;


-- exibe local
delimiter ## 
create procedure sp_exibelocal(ppesquisa varchar(80))
begin
	set ppesquisa = concat('%',ppesquisa,'%');
	
    select loccodigo 'CODIGO', locnome 'ESTADO', locmapa 'MAPA'
    from local
    where locnome like ppesquisa or locmapa like ppesquisa;
end##
delimiter ;


-- deletar local
delimiter ##
create procedure sp_deletalocal(ploccodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vlocal boolean default 0;
    
    set vlocal = (select count(*) from local where loccodigo = ploccodigo);
    
    if vlocal then
		delete from local where loccodigo = ploccodigo;
        
        set vmsg = 'Local deletado com exito.';
    else 
		set vmsg = 'Local não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


-- editar local
delimiter ##
create procedure sp_editalocal(ploccodigo int, plocnome varchar(45), plocmapa varchar(80))
begin
	declare vmsg varchar(100) default '';
    declare vlocal boolean default 0;
    declare vnovolocal boolean default 0;
    
    set vlocal = (select count(*) from local where loccodigo = ploccodigo);
    set vnovolocal = (select count(*) from local where locnome = plocnome);
    
    if vlocal then
		if plocnome <> '' or plocmapa <> '' then
			if vnovolocal then
				set vmsg = 'Local ja se encontra cadastrado no Sistema.';
			else
				update local
                set locnome = plocnome, locmapa = plocmapa
                where loccodigo = ploccodigo;
				set vmsg = 'Local atualizado com sucesso.';
			end if;
		else
			set vmsg = 'Insirar valores valido para cadastra um novo local.';
		end if;
    else 
		set vmsg = 'Local não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


-- carrega local
delimiter ##
create procedure sp_carregalocal(ploccodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vlocal boolean default 0;
    
    set vlocal = (select count(*) from local where loccodigo = ploccodigo);
    
    if vlocal then
		select loccodigo 'CODIGO', locnome 'ESTADO', locmapa 'MAPA'
        from local
        where loccodigo = ploccodigo;
    else 
		set vmsg = 'Local não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


