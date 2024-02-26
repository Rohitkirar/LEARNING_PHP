<?php 

// SELECT database() ;  return current connected database name 

// USE databaseName ;  use to select database

// SHOW databases;  show the list of database available to connect

"CREATE DATABASE [IF NOT EXISTS] database_name
[CHARACTER SET charset_name]
[COLLATE collation_name];

# CREATE DATABASE IF NOT EXISTS testdb2; -- create db if not exist in server

# CREATE DATABASE  testdb2; -- trying to create db if already present generate error

# SHOW CREATE DATABASE testdb2;  -- After that, use the SHOW CREATE DATABASE command to review the created database:

USE testdb2;

# In MySQL, schemas are synonyms of databases.

# The DROP DATABASE statement drops all tables in the database and deletes the database permanently. 
# Therefore, you need to be very careful when using this statement.

DROP DATABASE [IF EXISTS] database_name;

DROP DATABASE testdb2;

# If you drop a database that does not exist, MySQL will issue an error.
# To prevent an error from occurring if you delete a non-existing database, you can use the IF EXISTS option. In this case, MySQL will terminate the statement without issuing any error.

DROP DATABASE IF EXISTS testdb2;

-- The DROP DATABASE statement returns the number of tables it deleted.

-- In MySQL, the schema is the synonym for the database. Therefore, you can use them interchangeably:

DROP SCHEMA IF EXITS testdb2;

-- Use the MySQL DROP DATABASE statement to delete a database.
"
?>