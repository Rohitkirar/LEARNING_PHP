<?php 
//The continue statement can be used to jump out of the current iteration of a loop, and continue with the next.
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      continue;
    }
    echo "The number is: $x <br>\n";
  }
?>