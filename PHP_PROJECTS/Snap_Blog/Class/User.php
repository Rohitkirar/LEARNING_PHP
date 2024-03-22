<?php 


class User extends Connection{
    
    private $user_id ;

    public function __construct($id = null){
        $this->createConnection();
        if($id){    
            $this->user_id = $id;
        }
    }

    public function userRegister($userdetails){

        $keys = array_keys($userdetails);
        $values = array_values($userdetails);
        $keys = substr(json_encode($keys) , 1 , -1);
        $values = substr(json_encode($values) , 1 , -1);
        
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
            $this->user_id = $result['id'];
            $_SESSION['user_id'] = $this->user_id;
            return true;
        } 
        return false;
    }

    public function userDetails(){
        $sql = "SELECT id , first_name , last_name , age , gender , email , mobile , password , role 
                FROM users WHERE id = $this->user_id";
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_assoc($result);
            return $result;
        }
        return false;
    }

    public function storyDetails($story_id = null){
        if($story_id){
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id AND story.id = $story_id 
                    WHERE storycategory.deleted_at IS NULL AND story.deleted_at IS NULL;";
                
        }
        else{
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content 
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id
                    WHERE storycategory.deleted_at IS NULL AND story.deleted_at IS NULL;";
                
        }

        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function imageDetails( $story_id){
        $sql = "SELECT image FROM storyimages WHERE story_id = $story_id AND deleted_at IS NULL";
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function updatePassword($oldpassword , $newpassword){
        
        $sql = "SELECT password FROM users WHERE id = $this->user_id";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            
            $result = mysqli_fetch_assoc($result);
            $oldpassword = md5($oldpassword);
            
            if($result['password'] == $oldpassword){
                $newpassword = md5($newpassword);
                $sql = "UPDATE users SET password = '$newpassword' WHERE id = $this->user_id";
                $result = mysqli_query($this->conn , $sql);
                
                if($result)
                    return true;
                
                return false;
            }
        }
        return false;
    }

    public function updateUserDetails($first_name , $last_name , $age , $gender , $email , $mobile , $password){
        
        $password  = md5($password);
        $sql = "UPDATE users SET first_name = '$first_name' , last_name = '$last_name' , age = $age , gender = '$gender' ,
        email = '$email' , mobile = '$mobile' WHERE id = $this->user_id  AND password = '$password' ";
        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function commentDetails($story_id){

        $sql = "SELECT id as comment_id , content , user_id , CONCAT(first_name , ' ' , last_name) as full_name , story_id 
                FROM storycomments JOIN users ON user_id = users.id AND story_id = $story_id 
                WHERE  storycomments.deleted_at IS NULL";
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function addComment($story_id , $content ){
        $sql = "INSERT INTO storycomments (user_id , story_id , content)
                VALUES ($this->user_id , $story_id , '$content') ";
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    public function updateComment( $story_id , $content){
        $sql = "UPDATE storycomments SET content = '$content' WHERE story_id = $story_id AND user_id = $this->user_id";
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    public function deleteComment($conn , $comment_id ){
        $sql = "UPDATE storycomments SET deleted_at = DEFAULT 
                WHERE id = $comment_id AND user_id = $this->user_id";
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }

    public function likeDetails( $story_id){
        $sql = "SELECT id as like_id , user_id , story_id , CONCAT(first_name , ' ' , last_name) as full_name 
                FROM  storylikes JOIN users ON user_id = users.id AND story_id = $story_id
                WHERE storylikes.deleted_at IS NULL";

        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result ;
        }
        return false;
    }
    
    public function addLike($story_id ){
        $sql = "SELECT id as like_id , deleted_at FROM storylikes WHERE user_id = $this->user_id AND story_id = $story_id ";
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result) > 0){
            
            $result = mysqli_fetch_assoc($result);
            if($result['deleted_at']){
                $sql = "UPDATE storylikes SET deleted_at = DEFAULT WHERE id = {$result['like_id']} ";
            }
            else{
                $sql = "UPDATE storylikes SET deleted_at = CURRENT_TIMESTAMP WHERE id = {$result['like_id']} ";
            }
        }

        else{
            $sql = "INSERT INTO storylikes (user_id , story_id )
                    VALUES ($this->user_id , $story_id) ";
        }
        $result = mysqli_query($this->conn , $sql);

        if($result)
            return true;

        return false;
    }

    public function deleteLike( $like_id , $user_id){
        $sql = "UPDATE storylikes SET deleted_at = DEFAULT 
                WHERE user_id = $user_id AND id = $like_id ";

        $result = mysqli_query($this->conn , MYSQLI_ASSOC);
        if($result)
            return true;

        return false;
    }
}

?>