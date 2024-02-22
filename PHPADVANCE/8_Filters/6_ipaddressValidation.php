<?php 
/*
validate an IP address 
checks to remember while validating ipv4 
    -> decimal number separated by dot
    -> only three dot are necessary in ipv4
    -> decimal number should range in 0 to 255 only

filter : FILTER_VALIDATE_IP
*/

$ipaddress = "127.232.122.99";

if(filter_var($ipaddress , FILTER_VALIDATE_IP)){
    echo "$ipaddress ip address is valid <br>" ;
}
else {
    echo "$ipaddress invalid ip address <br>" ;
}

$ipaddress = "27.256.122.99";

if(filter_var($ipaddress , FILTER_VALIDATE_IP)){
    echo "$ipaddress ip address is valid <br>" ;
}
else {
    echo "$ipaddress invalid ip address <br>" ;
}
?>