<?php
/**
 MYSQL intro
 * MySQL is the most popular database system used with PHP.

 What is MySQL?
 * MySQL is a database system that runs on a server
 * MySQL is ideal for both small and large applications
 * MySQL is very fast, reliable, and easy to use
 * MySQL uses standard SQL
 * MySQL compiles on a number of platforms
 * MySQL is free to download and use
 * MySQL is developed, distributed, and supported by Oracle Corporation
 * MySQL is named after co-founder Monty Widenius's daughter: My
 * MySQL is a database system used on the web
 
The data in a MySQL database are stored in tables.
A table is a collection of related data, and it consists of columns and rows.

 Database Queries
 * A query is a question or a request.
 * We can query a database for specific information and have a recordset returned.

 PHP Connect to MySQL

 * MySQLi extension (the "i" stands for improved)
 * PDO (PHP Data Objects)
 
 * If you need a short answer, it would be "Whatever you like".

 * Both MySQLi and PDO have their advantages:

 * PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases.

 * So, if you have to switch your project to use another database, PDO makes the process easy. You only have to change the connection string and a few queries. With MySQLi, you will need to rewrite the entire code - queries included.

 * Both are object-oriented, but MySQLi also offers a procedural API.

 * Both support Prepared Statements. 
 * Prepared Statements protect from SQL injection, and are very important for web application security.
 
 * In this, and in the following chapters we demonstrate three ways of working with PHP and MySQL:

    * -> MySQLi (object-oriented) //$conn->close;
    * -> MySQLi (procedural) //$conn->close();
    * -> PDO   //$conn = null ;
 */
?>