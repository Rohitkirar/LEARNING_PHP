<?php
 echo ("there are two keywords used  to print output in php that are echo and print  \n"  . 
      "\n"  .
      "echo / echo() \n" .
      "echo is used with or without parenthesis like echo ; or echo(); \n" . 
      "echo doesn't generate any return value after executing \n" . 
      "echo is faster than print statement\n" .
      "\n" . 
      "print / print() \n"  . 
      "print is used with or without parenthesis like print() or print \n" . 
      "print return 1 as value after executed so it can we use in expression also \n" . 
      "print is quite slow as compare to echo \n"  
    );
    echo "\n" ;
    echo "message is printing from echo keyword \n";
    print "message is printing from print keyword \n";
    $x = print("checking the return value of print \n");
    print($x);
?>
