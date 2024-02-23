<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            background-color: whitesmoke;
            margin : 5% 25% 0 25%;
            padding : 10% 10% 10% 10%;;
            align-items: center;
            height : 10rem;
            width : 20rem;
            border : 1px solid black;
        }
        input{
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
        Name : <input type="text" name="name" id="name">
        <br>
        Title : <input type="text" name="title" id="title">
        <br>
        <input type="submit" >
        <input type="reset" value="clear">
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $title = htmlspecialchars($_POST['title']);
        if(empty($name) || empty($title)){
           echo ("Name/Title is empty");
        }
        else{
            echo("Output :- <BR>\n");
            echo("Name : $name <br>\n");
            echo("Title : $title <br>\n");
        }
    }
    ?>

</body>
</html>