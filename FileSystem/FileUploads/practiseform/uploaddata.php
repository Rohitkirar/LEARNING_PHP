<?php 
function uploaddata(){
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        // $fileType = $file['type'];

        $fileExt = explode("." , $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = ["jpg" , "jpeg" , "pdf" , "png"] ;
        if(!file_exists("../uploads/file/$fileName" )){
            if(in_array($fileActualExt , $allowed)){
                if($fileError === 0){
                    if($fileSize < 100000){
                        
                        // $fileNameNew = uniqid('' , true).".".$fileActualExt;

                        $fileDestination = '../uploads/file/' . $fileName;

                        move_uploaded_file($fileTmpName , $fileDestination);
                        header("location: htmlform.php?uploadsuccess");
                        return true;
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
    return false;
}
function multipleuploaddata(){
    if(isset($_POST['submit'])){
        $files = $_FILES['files'];   
        foreach($files as $key => $values){
            $temp = "$key";
            $$temp = $values;
        }
    }
$flag = true;
for($i=0 ; $i<count($name) ; $i++){
if($flag == true){
    $fileName = $name[$i];
    $fileTmpName = $tmp_name[$i];
    $fileSize = $size[$i];
    $fileError = $error[$i];
    // $fileType = $file['type'];

    $fileExt = explode("." , $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = ["jpg" , "jpeg" , "pdf" , "png"] ;
    if(!file_exists("../uploads/file/$fileName" )){
        if(in_array($fileActualExt , $allowed)){
            if($fileError === 0){
                if($fileSize < 10000000){
                    
                    // $fileNameNew = uniqid('' , true).".".$fileActualExt;

                    $fileDestination = '../uploads/file/' . $fileName;

                    move_uploaded_file($fileTmpName , $fileDestination);
                    // header("location: htmlform.php?uploadsuccess");
                     $flag = true;
                }
                else
                    $flag = false ;
            }
            else
                $flag = false;
        }
        else
            $flag = false ;
    }
    else
        $flag = false;
}
}
    return $flag;
}

?>