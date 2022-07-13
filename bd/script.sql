
create database if not exists loja;
use loja;

create or replace table cliente(
    id int primary key auto_increment,
    nome varchar(250) not null,
    email varchar(250) not null unique,
    cpf int not null unique,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table cliente add column foto text not null default "imagens\\tenis.png" after nome;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('admin@loja.com.br', md5('loja@123'));

alter table cliente add column arquivo text not null default "" after id;