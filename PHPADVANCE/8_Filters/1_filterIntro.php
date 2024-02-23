<?php 
/*
* Validating data = Determine if the data is in proper form.
* Sanitizing data = Remove any illegal character from the data.

The PHP Filter Extension
->PHP filters are used to validate and sanitize external input.

->The PHP filter extension has many of the functions needed for checking user input, and is designed to make data validation easier and quicker.

Why Use Filters?
Many web applications receive external input. External input/data can be:
-> User input from a form
-> Cookies
-> Web services data
-> Server variables
-> Database query results

You should always validate external data!
Invalid submitted data can lead to security problems and break your webpage!
By using PHP filters you can be sure your application gets the correct input!


filters 
1)FILTER_VALIDATE_INT
2)FILTER_SANITIZE_STRING //rm from php 8
3)FILTER_VALIDATE_IP
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
  <?php
  foreach (filter_list() as $id =>$filter) {
    echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
  }
  ?>
</table>
</body>
</html>