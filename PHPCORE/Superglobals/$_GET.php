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
    <div>
        <form action="demophpfile_GET.php"  method="GET">
            Name : <input type="text" name="name" id="name">
            <br>
            Title : <input type="text" name="title" id="title">
            <br>
            <input type="submit" >
            <input type="reset" value="clear">
        </form>
    </div>
    

    <div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET">
            Name : <input type="text" name="name" id="name">
            <br>
            Title : <input type="text" name="title" id="title">
            <br>
            <input type="submit" name='submit' >
            <input type="reset" value="clear">
        </form>
    </div>

    <?php 
    if(isset($_GET['submit'])){
    echo "Name : " . $_GET['name'] ;
    echo "<BR>"; 
    echo "Title : "  . $_GET['title'];
    }
    ?>
</body>
</html>