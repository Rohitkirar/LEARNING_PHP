<?php 
function createConnection($localhost , $user , $password , $dbname){
    $conn = mysqli_connect( $localhost , $user , $password , $dbname );
    if(!$conn){
        echo "ERROR " . mysqli_connect_error($conn);
        return false;
    }
    return $conn;
}
?>