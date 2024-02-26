/*
    -> When you log in to a MySQL database server using the mysql client tool without specifying a database name, 
       MySQL server will set the current database to NULL.
    ->  you have learned various ways to select a MySQL database via the mysql program and MySQL Workbench application.
*/

SELECT database(); -- to display current database

-- To select a database to work with, you use the USE statement:

USE classicmodels;  -- databaseName

-- if it doesn't exist then error get ERROR 1049 (42000): Unknown database 'classicmodels'

SHOW databases;  -- to show the db available on the server to connect

/*
 -> To create a new database in MySQL, you use the CREATE DATABASE statement. The following illustrates the basic syntax of the CREATE DATABASE statement:
 -> First, specify the name of the database after the CREATE DATABASE keywords. The database name must be unique within a MySQL server instance. If you attempt to create a database with an existing name, MySQL will issue an error.
 -> Second, use the IF NOT EXISTS option to create a database if it doesn’t exist conditionally.
 -> Third, specify the character set and collation for the new database. If you skip the CHARACTER SET and COLLATE clauses, MySQL will use the default character set and collation for the new database.
*/

CREATE DATABASE [IF NOT EXISTS] database_name
[CHARACTER SET charset_name]
[COLLATE collation_name];

CREATE DATABASE IF NOT EXISTS testdb2; -- create db if not exist in server

CREATE DATABASE  testdb2; -- trying to create db if already present generate error

SHOW CREATE DATABASE testdb2;  -- After that, use the SHOW CREATE DATABASE command to review the created database:

USE testdb2;

-- In MySQL, schemas are synonyms of databases.

-- The DROP DATABASE statement drops all tables in the database and deletes the database permanently. 
-- Therefore, you need to be very careful when using this statement.

DROP DATABASE [IF EXISTS] database_name;

DROP DATABASE testdb2;

-- If you drop a database that does not exist, MySQL will issue an error.
-- To prevent an error from occurring if you delete a non-existing database, you can use the IF EXISTS option. In this case, MySQL will terminate the statement without issuing any error.

DROP DATABASE IF EXISTS testdb2;

-- The DROP DATABASE statement returns the number of tables it deleted.

-- In MySQL, the schema is the synonym for the database. Therefore, you can use them interchangeably:

DROP SCHEMA IF EXITS testdb2;

-- Use the MySQL DROP DATABASE statement to delete a database.

