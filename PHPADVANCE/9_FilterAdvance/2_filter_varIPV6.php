<?php 
/*
filter_var($ip , FILTER_VALIDATE_IP , FILTER_FLAG_IPV6);
*/
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if(filter_var($ip , FILTER_VALIDATE_IP , FILTER_FLAG_IPV6)){
    echo "$ip is a valid IPv6 address<br>";
}
else{
    echo "$ip is not a valid IPv6 address<br>" ;
}

//Example 2 

$ipaddress = "127.232.122.99";

if(filter_var($ipaddress , FILTER_VALIDATE_IP , FILTER_FLAG_IPV6)){
    echo "$ipaddress ip address is not IPV6 valid <br>" ;
}
else {
    echo "$ipaddress invalid IPV6 address <br>" ;
}

?>