<?php 
class User extends Connection{
    
    public function __construct($id = null){
        $this->createConnection();
    }
    
    public function userRegister($userdetails){

        $password = md5($userdetails['password']) ;
        $sql = "INSERT INTO users (first_name , last_name , gender , age , mobile , email , username , password)
                VALUES ( 
                        '{$userdetails['first_name']}' , 
                        '{$userdetails['last_name']}' , 
                        '{$userdetails['gender']}' ,
                        '{$userdetails['age']}' , 
                        '{$userdetails['mobile']}' , 
                        '{$userdetails['email']}' , 
                        '{$userdetails['username']}' ,
                        '$password' 
                        )";

        if(mysqli_query($this->conn , $sql))
            return true;
        
        return false;
    }
    
    public function userLogin($username , $password){

        $password = md5($password);

        $sql = "SELECT id 
                FROM users 
                WHERE username = '$username' AND password = '$password' ";
        
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $result['id'] ;
            
            return true;
        } 
        return false;
    }

    // fn use to fetch user details by user_id or fetch all users details without passing user_id
    public function userDetails($user_id=null){  
        if($user_id)
            $sql = "SELECT * 
                    FROM users 
                    WHERE id = $user_id";

        else
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status 
                    FROM users 
                    WHERE role != 'admin'  ";
        
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    // this fn only delete user admin data is not deleted by this
    public function deleteUser($user_id){

        $userData = $this->userDetails($user_id);
        if($userData[0]['role'] == 'admin')
            return false;

        $sql = "UPDATE users 
                SET deleted_at = CURRENT_TIMESTAMP 
                WHERE id = $user_id";
        
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    //user can update their password by verify with user_id and oldpassword

    public function updatePassword($user_id , $oldpassword , $newpassword){
        
        if($this->userVerify($user_id , $oldpassword)){

            $newpassword = md5($newpassword);
            $sql = "UPDATE users SET password = '$newpassword' WHERE id = $user_id";
            $result = mysqli_query($this->conn , $sql);
            if($result)
                return true;
        }
        return false;
    }

    // private function to verify user before update and changes in database

    private function userVerify($user_id , $password){

        $password  = md5($password);

        $sql = "SELECT 1 as result FROM users WHERE id = $user_id AND password = '$password' ";

        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result))
           return true; 
        
        return false;
    }

    // function works for admin (only update details of user not his details)  and user (user can update details)

    public function updateUserDetails($user_id , $password = null ,  $userdetails){
        
        if($password)
            if(!$this->userVerify($user_id , $password))
                return false;

        $sql = "UPDATE users 
                SET first_name = '{$userdetails['first_name']}' ,
                    last_name = '{$userdetails['last_name']}' ,
                    age = {$userdetails['age']} ,
                    email = '{$userdetails['email']}' ,
                    mobile = '{$userdetails['mobile']}' ,
                    username = '{$userdetails['username']}' ,
                    deleted_at = DEFAULT 
                WHERE id = $user_id ";
        
        if(mysqli_query($this->conn , $sql))
            return true;

        return false;
    }
}

?>