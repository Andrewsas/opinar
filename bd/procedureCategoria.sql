use projeto_bd;

-- Exibe todas categorias
delimiter ##
create procedure sp_exibecategorias(pcatnome varchar(45))
begin
		declare vpesquisa varchar(48) default '';
        set vpesquisa = concat('%',pcatnome,'%');
        
		select catcodigo 'CODIGO', catnome 'NOME', catstatus 'STATUS'
        from categoria
		where catnome like vpesquisa
        order by catnome;
end##
delimiter ;


delimiter ##
create procedure sp_cadastracategoria(pcatnome varchar(45), pcatimg varchar(150))
begin
	declare vcategoria boolean default 0;
    declare vmsg varchar(100) default '';
    
    if pcatnome <> '' and pcatimg <> '' then
		set vcategoria = (select count(*) from categoria where catnome = pcatnome);
		
		if vcategoria then
			set vmsg = 'Categoria ja se encontrar cadastrada no Sistema.';
		else
			insert into categoria values(null, upper(pcatnome), pcatimg,1);
            set vmsg = 'Nova Categoria adicionada com sucesso.';
		end if;
	else
		set vmsg = 'Insirar valores validos para realizar o cadastro de Categoria.';
	end if;
    if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


-- desativa categoria
delimiter ##
create procedure sp_desativacategoria(pcatcodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vcategoria boolean default 0;
    
    set vcategoria = (select count(*) from categoria where catcodigo = pcatcodigo);
    
    if vcategoria then
		update categoria
        set catstatus = 0
        where catcodigo = pcatcodigo;
        
        set vmsg = 'Categoria desativada com exito.';
    else 
		set vmsg = 'Categoria não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


-- ativa categoria
delimiter ##
create procedure sp_ativacategoria(pcatcodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vcategoria boolean default 0;
    
    set vcategoria = (select count(*) from categoria where catcodigo = pcatcodigo);
    
    if vcategoria then
		update categoria
        set catstatus = 1
        where catcodigo = pcatcodigo;
        
        set vmsg = 'Categoria ativada com exito.';
    else 
		set vmsg = 'Categoria não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;


-- deletar categoria
delimiter ##
create procedure sp_deletacategoria(pcatcodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vcategoria boolean default 0;
    
    set vcategoria = (select count(*) from categoria where catcodigo = pcatcodigo);
    
    if vcategoria then
		delete from categoria where catcodigo = pcatcodigo;
        
        set vmsg = 'Categoria deletada com exito.';
    else 
		set vmsg = 'Categoria não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;

-- edita categoria
delimiter ##
create procedure sp_editacategoria(pcatcodigo int, pcatnome varchar(45), pcatimg varchar(150))
begin
	declare vmsg varchar(100) default '';
    declare vcategoria boolean default 0;
    declare vcatnome boolean default 0;
    
    set vcategoria = (select count(*) from categoria where catcodigo = pcatcodigo);
    
    if vcategoria then
		set vcatnome = (select count(*) from categoria where catnome = pcatnome and catcodigo <> pcatcodigo);
        
        if vcatnome then
            set vmsg = 'Categoria ja se encontrar cadastrada no Sistema.';
		else
			update categoria
            set catnome = upper(pcatnome), catimg = pcatimg
            where catcodigo = pcatcodigo;
            
            set vmsg = 'Categoria atualizada com exito.';
		end if;
    else 
		set vmsg = 'Categoria não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;

-- carregar categoria
delimiter ##
create procedure sp_carregacategoria(pcatcodigo int)
begin
	declare vmsg varchar(100) default '';
    declare vcategoria boolean default 0;
    
    set vcategoria = (select count(*) from categoria where catcodigo = pcatcodigo);
    
    if vcategoria then
		select catcodigo 'CODIGO', catnome 'CATEGORIA', catimg 'IMG', 'Categoria carrega com sucesso.' as RESULT
        from categoria
        where catcodigo = pcatcodigo;
        
    else 
		set vmsg = 'Categoria não encontrada no Sitema.';
	end if;

	if vmsg <> '' then
		select vmsg 'RESULT';
    end if;
end##
delimiter ;
