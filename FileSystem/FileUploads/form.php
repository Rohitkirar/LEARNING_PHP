<?php 

$name = $email = $file = "" ;

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileType = $file["type"];
    $fileSize = $file['size'];
    $allowed = ["png" , "jpg"];
    $fileExt = explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if(in_array($fileActualExt , $allowed)){
        if($fileError === 0){
            if($fileSize<100000){
                if(file_exists($fileName)){
                
                $fileNameNew = uniqid("" , $fileName).".".$fileActualExt;
                $fileDestination = "uploads/$fileNameNew" ;
                header("location: /output.php") ;
                move_uploaded_file($fileTmpName , $fileDestination);
                echo "Uploaded successfully!" ;
                echo $name ;
                echo $email;
                }
                else{
                    echo("file already uploaded!") ;
                }
                
            }
            else  {  
                echo("File is to big to upload!");
            }
        }
        else{
            echo "File contains error!";
        }
    }
    else{
        echo "invalid file format!";
    }
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
    <form action=" <?php echo $_SERVER['PHP_SELF'] ;?> " method="POST" enctype="multipart/form-data" >

    <label for="name">Name</label><br>
    <input type="text" name="name" id="name"><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" ><br>

    <label for="image">Image</label><br>
    <input type="file" name="file" id="image"><br>

    <input type="submit" name="submit" ><br>

    </form>
</body>
</html>