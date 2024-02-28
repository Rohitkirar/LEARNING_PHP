use classicmodels;

--  to rename a column 
show TABLES;

CREATE TABLE name ( name varchar(10) not null );


ALTER TABLE name
RENAME COLUMN name to username;

ALTER TABLE name 
change COLUMN username name varchar(10) not null;

ALTER TABLE name
modify column name varchar(20) not null;

DESCRIBE name;