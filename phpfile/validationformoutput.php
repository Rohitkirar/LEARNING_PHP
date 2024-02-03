<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "Name : " . $_POST['name'] . "<br>";
    echo 'Email : ' . $_POST['email'] . "<br>";
    echo "Gender  : " . $_POST['gender'] . "<br>";
    echo "Website : " . $_POST['web'] . "<br>";
    echo "Comment : " . $_POST['comment'] . "<br>" ;
}
?>