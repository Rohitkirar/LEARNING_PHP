
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






