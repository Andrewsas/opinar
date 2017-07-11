create database projeto_bd;

use projeto_bd;

create table tipo_usuario(
	tipcodigo int unsigned not null auto_increment,
	tipdescricao varchar(45) not null,
    primary key (tipcodigo)
);

create table local(
	loccodigo int unsigned not null auto_increment,
    locdescricao varchar(45),
    locmapa varchar(80),
    primary key (loccodigo)
);

create table categoria(
	catcodigo int unsigned not null auto_increment,
    catnome varchar(45) not null,
    catimg varchar(150) not null,
    catstatus boolean not null,
    primary key (catcodigo)
);

create table usuario(
	usucodigo int unsigned not null auto_increment,
    usuemail varchar(80) not null,
    usunickname varchar(45) not null,
    usutipcodigo int unsigned not null,
    ususenha varchar(45) not null,
    usustatus boolean not null,
    primary key (usucodigo, usuemail, usunickname),
    foreign key (usutipcodigo) references tipo_usuario (tipcodigo)
);

create table item (
	itmcodigo int unsigned not null auto_increment,
    itmusucodigo int unsigned not null,
    itmcatcodigo int unsigned not null,
    itmloccodigo int unsigned,
    itmnome varchar(45) not null,
    itmdescricao varchar(900) not null,
    itmdata date not null,
    itmstaus boolean not null,
    primary key (itmcodigo),
    foreign key (itmusucodigo) references usuario (usucodigo),
    foreign key (itmcatcodigo) references categoria (catcodigo),
    foreign key (itmloccodigo) references local (loccodigo)
);

create table avalia_item(
	ava_itmusucodigo int unsigned not null,
    ava_itmitmcodigo int unsigned not null,
    ava_itmgostou boolean not null default 0,
    ava_itmnaogostou boolean not null default 0,
    ava_itmspan boolean not null default 0,
    ava_itmcomentario varchar(150) not null,
    primary key(ava_itmusucodigo, ava_itmitmcodigo),
    foreign key(ava_itmusucodigo) references usuario (usucodigo),
    foreign key(ava_itmitmcodigo) references item (itmcodigo)
);

create table avalia_comentario(
	ava_comusucodigo int unsigned not null,
    ava_comava_itmusucodigo int unsigned not null,
    ava_comava_itmitmcodigo int unsigned not null,
    ava_comgostou boolean not null default 0,
    ava_comnaogostou boolean not null default 0,
    ava_comspan boolean not null default 0,
    primary key (ava_comusucodigo, ava_comava_itmusucodigo, ava_comava_itmitmcodigo),
    foreign key (ava_comusucodigo) references usuario (usucodigo),
    foreign key (ava_comava_itmusucodigo) references avalia_item (ava_itmusucodigo),
	foreign key (ava_comava_itmitmcodigo) references avalia_item (ava_itmitmcodigo)
);




