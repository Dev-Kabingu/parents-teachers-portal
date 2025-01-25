create database parents_teacher;

create table users (
    id int not null primary key,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    email varchar(200) not null unique,
    phone varchar(20) not null,
    address varchar(200) not null,
    password varchar(200) ot null,
    role varchar (20) not null default 'parent',
    created_at datetime not null default current_timestamp
);