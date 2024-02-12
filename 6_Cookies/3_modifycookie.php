<?php 

// To modify a cookie, just set (again) the cookie using the setcookie() function:

    print_r($_COOKIE); echo "<br>";

    setcookie("user2" , "Roman Reign" ,time()+300,'/');

    setcookie("user3" , "John Cena" , time() + 300 , "/" );
    
    setcookie("user4" , "Randy ortan");
    
    setcookie("user5" , "Ratan Tata Sir" ) ;

    print_r($_COOKIE); echo "<br>";
?>