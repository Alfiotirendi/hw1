Create DATABASE hw1;
USE hw1;

CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null
) Engine = InnoDB;


create table ricetta(
id integer primary key ,
name varchar(255) not null,
imglink varchar(255)

) Engine= innoDB;


CREATE table pref(
	idu integer,
    idmeal integer,
    index ind_ricetta (idmeal),
    index ind_user (idu),
    foreign key (idu) references users(id),
	foreign key (idmeal) references ricetta(id)
)Engine= innodb;
