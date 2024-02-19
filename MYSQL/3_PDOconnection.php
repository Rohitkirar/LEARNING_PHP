<?php 
/** 
 PDO (PHP Data Objects)
 * A great benefit of PDO is that it has an exception class to handle any problems that may occur in our database queries. 
 * If an exception is thrown within the try{ } block, the script stops executing and flows directly to the first catch(){ } block.
*/

$host = "localhost";
$username = "root" ;
$password = "";
$mydb = "classicmodels" ;
try{
    
$conn = new PDO("mysql:host=$host;dbname=$mydb;" , $username , $password);
Echo "connection Succesfull!";

}
catch(PDOException $e){
    echo "ERROR " . $e->getMessage();
}

/**
 * The PDO_MYSQL Data Source Name (DSN) is composed of the following elements:
 * DSN prefix
The DSN prefix is mysql:.

host
* The hostname on which the database server resides.

port
* The port number where the database server is listening.

dbname
* The name of the database.

unix_socket
* The MySQL Unix socket (shouldn't be used with host or port).

charset
* The character set. See the character set concepts documentation for more information.
*/
?>