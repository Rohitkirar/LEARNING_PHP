<?php 
//to insert character that are illegal in a string use escape charater i.e backlash \
$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";

// \n - newline 
echo("This is a string which is having length greater than 30.\nThis is a string which is having length greater than 30");
echo("\n$str");

echo("<br>\n");

// \r - carriage return 
echo("This is a string\rwhich is having length greater than 30. This is a string which is having length greater than 30");

echo("<br>\n");

// \" - double quote
echo("This is a \"string\" which is having length greater than \"30\". This is a \"string\" which is having length greater than \"30\"");

echo("<br>\n");

// \' - single quote
echo("This is a \'string\' which is having length greater than \'30\'. This is a \'string\' which is having length greater than \'30\'");

echo("<br>\n");

// \t - tab  
echo("\tThis is a string which is having length greater than \t30.\n\tThis is a string which is having length greater than \t30");

echo("<br>\n");

// \$ - to insert php variable
echo("The string is stored in \$str variable -> This is a string which is having length greater than 30. This is a string which is having length greater than 30");

echo("<br>\n");

// \f - form feed 


// \ooo - octal value (backslash followed by three integer value)
echo("\141\142\143\144\145");

echo("<br>\n");

// \xhh - hex value
echo("\x41\x42\x43\x44\x45");

echo("<br>\n");
?>