Drop DATABASE if exists contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE contacts(
    id int auto_increment primary key,
    name varchar(255),
    phone_number varchar(255)
);

insert into contacts (name, phone_number) values("andres","12312321");
