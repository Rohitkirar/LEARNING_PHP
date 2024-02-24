<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : TABLE CARD TYPE :  <BR>";

$sql = 
" SELECT * FROM CARDTYPE  ";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE  : Table CARD VALUE :  <BR>";

$sql = 
" SELECT * FROM CARDVALUE  ";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  : table CARDTYPE CROSS JOIN CARDVALUE TABLE :  <BR>";

$sql = 
"SELECT cardtype , cardvalue 
FROM CARDTYPE 
CROSS JOIN CARDVALUE
order by cardtype,
        cardvalue;  
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  :   <BR>";

$sql = 
"SELECT 
store_name, product_name
FROM 
stores2 AS a
CROSS JOIN
products2 AS b ;  
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  :  <BR>";

$sql = 
"SELECT 
    b.store_name,
    a.product_name,
    IFNULL(c.revenue, 0) AS revenue
FROM
    products2 AS a
        CROSS JOIN
    stores2 AS b
        LEFT JOIN
    (SELECT 
        stores2.id AS store_id,
        products2.id AS product_id,
        store_name,
            product_name,
            ROUND(SUM(quantity * price), 0) AS revenue
    FROM
        sales2
    INNER JOIN products2 ON products2.id = sales2.product_id
    INNER JOIN stores2 ON stores2.id = sales2.store_id
    GROUP BY stores2.id, products2.id, store_name , product_name) AS c ON c.store_id = b.id
        AND c.product_id= a.id
ORDER BY b.store_name; 
";

require('FILE/printdata.php');



$conn->close();
?>