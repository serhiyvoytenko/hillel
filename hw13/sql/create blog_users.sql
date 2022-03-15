CREATE TABLE blog_users
(
    id         INT auto_increment PRIMARY KEY ,
    username   VARCHAR (50)  NOT NULL ,
    last_name  VARCHAR (200) NULL ,
    first_name VARCHAR (200) NULL ,
    birthday   DATE         NULL ,
    email      VARCHAR (100) NOT NULL UNIQUE ,
    password   VARCHAR (100) NOT NULL UNIQUE
);