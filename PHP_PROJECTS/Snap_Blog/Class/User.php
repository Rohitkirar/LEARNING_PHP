<?php 


class User extends Connection{
    

    public function __construct($id = null){
        $this->createConnection();
    }
    

    public function userRegister($userdetails){

        $keys = substr(json_encode(array_keys($userdetails)) , 1 , -1);
        $values = substr(json_encode(array_values($userdetails)) , 1 , -1);
        
        $sql = "INSERT INTO users ($keys)
                VALUES ($values)";

        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }
    
    public function userLogin($username , $password){

        $password = md5($password);
        $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $result['id'] ;
            
            return true;
        } 
        return false;
    }

    public function userDetails($user_id=null){
        if($user_id){
            $sql = "SELECT id , first_name , last_name , age , gender , email , mobile , role 
                    FROM users WHERE id = $user_id";
        }
        else{
            $sql = "SELECT * FROM users ";
        }
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }



    public function updatePassword($user_id , $oldpassword , $newpassword){
        
        $sql = "SELECT password FROM users WHERE id = $user_id";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            
            $result = mysqli_fetch_assoc($result);
            $oldpassword = md5($oldpassword);
            
            if($result['password'] == $oldpassword){
                $newpassword = md5($newpassword);
                $sql = "UPDATE users SET password = '$newpassword' WHERE id = $user_id";
                $result = mysqli_query($this->conn , $sql);
                
                if($result)
                    return true;
            }
        }
        return false;
    }

    private function userVerify($user_id , $password){

        $sql = "SELECT password FROM users WHERE id = $user_id";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            
            $result = mysqli_fetch_assoc($result);
            $password  = md5($password);
            
            if($result['password'] == $password)
                return true;
        }
        return false;
    }

    public function updateUserDetails($user_id , $password ,  $userdetails ){
        
        if($this->userVerify($user_id , $password)){
            foreach($userdetails as $key => $value){
            $sql = "UPDATE users SET $key = '$value' WHERE id = $user_id  ";
            $result = mysqli_query($this->conn , $sql);
            
            if($result)
                continue;

            return false;
            }
        }
        else{
            return false;
        }
        return true;
    }
}

?>