create schema if not exists `login`;
use `login`;

create table if not exists `funcao`(
	id int(11) not null unique auto_increment primary key,
    funcao varchar(255)
);

create table if not exists `usuario`(
	id int(11) not null unique auto_increment primary key,
    nome varchar(255),
    email varchar(255),
    senha varchar(255),
    idfuncao int(11),
    foreign key(idfuncao) references `funcao`(id));

