<?php 

class User{
    private $user_id , $conn;

    public function __construct($id){
        require('../Database/Connection.php');
        $this->conn = createConnection('localhost' , 'root' , '' , 'Blogging_site');
        $this->user_id = $id;
    }

    public function userRegister($first_name , $last_name , $age , $gender , $email , $mobile , $username , $password){
        
        $sql = "INSERT INTO users (first_name , last_name , age , gender , email , mobile , username , password )
                VALUES ('$first_name' , '$last_name' , $age , '$gender' , '$email' , '$mobile' , '$username' , '$password')";
        
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }
    
    public function userLogin($username , $password){
        
        $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $result['id'];
            return true;
        } 
        return false;
    }



}

?>