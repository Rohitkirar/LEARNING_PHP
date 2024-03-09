-- Active: 1709188058198@@127.0.0.1@3306@accountmanagement
SHOW databases;

USE test;
SHOW TABLES;

SELECT * FROM employees;

DROP FUNCTION IF EXISTS updateName;

DELIMITER //
CREATE FUNCTION updateName( name varchar(50))
RETURNS varchar(50)
BEGIN
    DECLARE name_sst  varchar(50);
    SET name_sst =  CONCAT(name , ' sst');
    return name_sst;
END; //

DROP TRIGGER before_insert_update;

CREATE TRIGGER before_insert_update
BEFORE INSERT
ON employees
FOR EACH ROW
BEGIN
    DECLARE name_sst Varchar(50);
    SET name_sst = updateName( new.name );
    SET new.name = name_sst; 
END ; //


INSERT INTO employees
VALUES (6 , 'Hariom' , 55 , 10030 , 0 );


SELECT * FROM employees;