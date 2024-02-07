<?php 
if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode("." , $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = ["jpg" , "jpeg" , "pdg" , "png"] ;
    if(file_exists("uploads/$fileName" )){
        if(in_array($fileActualExt , $allowed)){
            if($fileError === 0){
                if($fileSize < 100000){
                    
                    $fileNameNew = uniqid('' , true).".".$fileActualExt;

                    $fileDestination = 'uploads/' . $fileNameNew;

                    move_uploaded_file($fileTmpName , $fileDestination);
                    echo "upload Successfully" ."<br>";
                    header("location: upload.php?uploadsuccess");
                }
                else
                    echo "Your file is too big ! max size allowed 100KB" ;
            }
            else
                echo "There was an error in uploading your file!<br>";
        }
        else
            echo "You can not upload files of this types ! <Br>" ;
    }
    else
        echo "file already exist!";
}


?>