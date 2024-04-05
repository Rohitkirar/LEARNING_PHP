<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to my homepage</h1>
    <h5>Form data Submiting using GET method</h5>
    <form action="/showformdata" method="get">
        First_Name : 
        <input type="text" name="first_name"><br>
        Last_Name : 
        <input type="text" name="last_name"><br>
        <input type="submit" name="submit">
    </form>

    <h5>Form data Submiting using POST method</h5>
    <form action="/showformdata" method="post">
        <?php  echo csrf_field(); ?> 
        First_Name : 
        <input type="text" name="first_name"><br>
        Last_Name : 
        <input type="text" name="last_name"><br>
        <input type="submit" name="submit">
    </form>

    <h1>USING Route::match(['GET' , 'POST'] , '/storeformdata2' , function(){}) method</h1>
    <h5>Form data Submiting using GET method</h5>
    <form action="/showformdata2" method="get">
        First_Name : 
        <input type="text" name="first_name"><br>
        Last_Name : 
        <input type="text" name="last_name"><br>
        <input type="submit" name="submit">
    </form>
    
    <h1>USING Route::match(['GET' , 'POST'] , '/storeformdata2' , function(){}) method</h1>
    <h5>Form data Submiting using POST method</h5>
    <form action="/showformdata2" method="post">
        <?php  echo csrf_field(); ?> 
        First_Name : 
        <input type="text" name="first_name"><br>
        Last_Name : 
        <input type="text" name="last_name"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>