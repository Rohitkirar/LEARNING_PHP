<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $name = $_GET["name"];
            $title = $_GET["title"];
            if(empty($name) || empty($title)){
                echo "Name/Title is empty <BR>";
            }
            else{
                echo "Name : $name <BR>";
                echo "Title : $title<BR>";
            }
        }
?>
</body>
</html>