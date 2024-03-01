
/*
 1. CREATE TABLE statement allows you to create a new table in a database.
    
    CREATE TABLE [IF NOT EXISTS] table_name(
	   column1 datatype constraints,
	   column1 datatype constraints,
	) ENGINE=storage_engine;
    
    NOTE: If you create a table with a name that already exists in the database, you’ll get an error. 
          To avoid the error, you can use the "IF NOT EXISTS" option.
          
	RULES
	1. WHEN creating TABLE must specify atleast 1 column
    2. always specify datatype along with column others it generate error
    3. 
*/

CREATE DATABASE IF NOT EXISTS testdb;

SHOW DATABASES;

USE testdb;

SHOW TABLES ;

--  Basic CREATE TABLE statement example

CREATE TABLE tasks (
	id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    end_date DATE
);

-- IF table already present it generate error so always use IF NOT EXISTS 

CREATE TABLE IF NOT EXISTS tasks(
	id INT ,
    title char,
    date DATE
);

-- must specify one col to create table otherwise it generate an error

CREATE TABLE task2; -- error

-- Creating a table with a foreign key example

CREATE TABLE IF NOT EXISTS checklists(
	id INT ,
    task_id INT,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id , task_id),
    FOREIGN KEY(task_Id)
		REFERENCES tasks(id)
);

use classicmodels;

CREATE TABLE IF NOT EXISTS customers_100 (
				S_No INT(6) , 
				customer_Id varchar(20) primary key , 
                First_name varchar(30) , 
                Last_Name varchar(30) , 
                Company varchar(100) , 
                city varchar(20) , 
                country varchar(20) , 
                phone_1 varchar(20) , 
                phone_2 varchar(20) , 
                Email varchar(20) , 
                Subscription_date varchar(10) , 
                Website varchar(100)
                ) ;
                
CREATE TABLE customers_100 (
				S_No INT(6) , 
				customer_Id varchar(20) primary key , 
                First_name varchar(30) , 
                Last_Name varchar(30) , 
                Company varchar(100) , 
                city varchar(20) , 
                country varchar(20) , 
                phone_1 varchar(20) , 
                phone_2 varchar(20) , 
                Email varchar(20) , 
                Subscription_date varchar(10) , 
                Website varchar(100)
                ) ;
                                
SELECT * FROM customers_100;

SELECT * FROM customers_100 ORDER BY S_No;

TRUNCATE TABLE customers_100;               -- NOTE : delete all the data from the table but not table

DROP TABLE customers_100;                   -- NOTE : DELETE the table along with data from database;

CREATE TABLE IF NOT EXISTS customers_1001;  			-- Generate Error : A table must have atleast one column to create






