<?php 

if(isset($_COOKIE['employeeid'])){
    echo "EMPLOYEE ID : " . $_COOKIE['employeeid'] . "<BR>";
    if(isset($_COOKIE['employeename'])){
    echo "EMPLOYEE Name : " . $_COOKIE['employeename'] . "<BR>";
    }
    else{
        echo "employee name cookie not set yet";
    }
}
else{
    echo "Cookie not set yet<br>";
}

?>