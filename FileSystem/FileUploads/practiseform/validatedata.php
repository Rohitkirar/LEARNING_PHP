<?php 
function validatedata(...$data){
    global $name, $email , $number , $designation ;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = test_data($_POST['name']);
        $email = test_data($_POST['email']);
        $number = test_data($_POST['number']);
        $designation = test_data($_POST['designation']);
        
        $text = "Name : $name\nEmail : $email\nNumber : $number\nDesignation : $designation\nFileName : ".$_FILES['file']['name'] ;

        $myfile = fopen("../uploads/textfile/userdata.txt" , 'w+') or die("unable to open file");
        fwrite($myfile , $text);
        fclose($myfile);
        return true;
    }

    return false;
}
function test_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>