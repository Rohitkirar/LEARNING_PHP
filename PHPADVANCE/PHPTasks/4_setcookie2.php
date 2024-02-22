<?php 
//4) create form with employeId and employe name, submit form and set both value in cookie. make new file and check cookie set or not ,if cookie is set then print value else not.
if(isset($_POST['submit'])){
    $employeeid = $_POST['employeeid'];
    $employeename = $_POST['employeename'];
    setcookie("employeeid" , $employeeid , time()+300 , '/');
    setcookie("employeename" , $employeename , time()+300 , '/');

    echo "form submitted successfully and cookie set<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="post">
        <label for="empid">Employee Id</label>
        <input type="text" name="employeeid" id="empid" required>
        <br>
        <label for="empname">Employee Id</label>
        <input type="text" name="employeename" id="empname" required>
        <br>
        <input type="submit" name="submit" >
        <input type="reset">
    </form>
    
</body>
</html>
