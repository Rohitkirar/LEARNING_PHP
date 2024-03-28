<?php 


class User extends Connection{
    

    public function __construct($id = null){
        $this->createConnection();
    }
    

    public function userRegister($userdetails){

        $keys = implode("," , array_keys($userdetails));
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
            $sql = "SELECT * FROM users WHERE id = $user_id";
        }
        else{
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status FROM users WHERE role != 'admin'  ";
        }
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function deleteUser($user_id){
        $userData = $this->userDetails($user_id);
        
        if($userData[0]['role'] == 'admin')
            return false;

        $sql = "UPDATE users SET deleted_at = CURRENT_TIMESTAMP WHERE id = $user_id";
        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

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

    public function updateUserDetails($user_id , $password = null ,  $userdetails ){
        if($password)
            if(!$this->userVerify($user_id , $password))
                return false;

        foreach($userdetails as $key => $value){
            $sql = "UPDATE users SET $key = '$value' , deleted_at = DEFAULT WHERE id = $user_id  ";
            $result = mysqli_query($this->conn , $sql);
            
            if($result)
                continue;

            return false;
        }
        return true;
    }
}

?>