<?php 

class Admin{
    private $admin_id , $conn;

    public function __construct($id){
        require('../Database/Connection.php');
        $this->conn = createConnection('localhost' , 'user' , '' , 'Blogging_site');  
        $this->admin_id = $id;
    }

    public function userDetails($user_id = null){
        if($user_id)
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status  FROM users WHERE id = $user_id ";
        
        else
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status  FROM users WHERE role = 'users' ";
        
        
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function storyDetails($story_id = null){
        if($story_id)
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status FROM story WHERE user_id = $this->admin_id ";

        else
            $sql = "SELECT * , IF(deleted_at , 0 , 1) as status FROM story WHERE user_id = $this->admin_id  AND id = $story_id ";

        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function categoryDetails($category_id = null){
        
        if($category_id)
            $sql = "SELECT * , IF(deleted_at , 0 , 1 ) as status FROM storycategory WHERE id = $category_id";
        
        else
            $sql = "SELECT * , IF(deleted_at , 0 , 1 ) as status FROM storycategory ";
        

        $result = mysqli_query($this->conn , $sql );
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function deleteUser($user_id){
        if($user_id == $this->admin_id)
            return false;
        
        $sql = "UPDATE users LEFT JOIN storycomments ON users.id = storycomments.user_id 
                LEFT JOIN storylikes ON users.id = storylikes.user_id
                SET users.deleted_at = CURRENT_TIMESTAMP,
                    storycomments.deleted_at = CURRENT_TIMESTAMP,
                    storylikes.deleted_at = CURRENT_TIMESTAMP 
                WHERE id = $user_id";

        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    public function updateUser($user_id , $first_name , $last_name , $gender , $age , $mobile , $email , $userName , $status){
        if($user_id == $this->admin_id)
            return false;

        $sql = "SELECT IF(deleted_at , 0 , 1) as currentstatus FROM users WHERE id = $user_id";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_assoc($result);
            $result = $result['currentstatus'];
            if($result){
                if($status == true){
                    $sql = "UPDATE users 
                            SET first_name = '$first_name' , last_name = '$last_name' , gender = '$gender', age = $age ,
                                mobile = '$mobile' , email = '$email' , username = '$userName'
                            WHERE id = $user_id ";
                }
                else{
                    $sql = "UPDATE users LEFT JOIN storycomments ON users.id = storycomments.user_id 
                            LEFT JOIN storylikes ON users.id = storylikes.user_id
                            SET users.deleted_at = CURRENT_TIMESTAMP,
                                storycomments.deleted_at = CURRENT_TIMESTAMP,
                                storylikes.deleted_at = CURRENT_TIMESTAMP 
                            WHERE id = $user_id";
                }
                $result = mysqli_query($this->conn , $sql);
                if($result)
                    return true;

                return false;
            }
            else{
                if($status == true){
                    $sql = "UPDATE users LEFT JOIN storylikes ON users.id = storylikes.user_id 
                            LEFT JOIN storycomments ON users.id = storycomments.user_id
                            SET first_name = '$first_name' , last_name = '$last_name' , gender = '$gender', age = $age ,
                                mobile = '$mobile' , email = '$email' , username = '$userName' ,
                                users.deleted_at = DEFAULT,
                                storylikes.deleted_at = DEFAULT,
                                storycomments.deleted_at = DEFAULT
                            WHERE id = $user_id";
                }
                else{
                    $sql = "UPDATE users 
                            SET first_name = '$first_name' , last_name = '$last_name' , gender = '$gender', age = $age ,
                                mobile = '$mobile' , email = '$email' , username = '$userName'
                            WHERE id = $user_id";
                }
                $result = mysqli_query($this->conn , $sql);
                if($result)
                    return true;

                return false;
            }
        } 
        return false;
    }

    public function addStory($title , $category_id , $content, $image){

        $sql = "INSERT INTO story (user_id , category_id , title , content)
                VALUES  ($this->admin_id , $category_id , '$title' ,  '$content');";

        $result = mysqli_query($this->conn , $sql);
        
        if($result){
            
            $sql = "SELECT id FROM story ORDER BY created_at DESC LIMIT 1";
            $result = mysqli_query($this->conn , $sql);
            
            if(mysqli_num_rows($result) > 0){
                $story_id = mysqli_fetch_assoc($result);
                $story_id = $story_id['id'];

                $result = $this->addImage($story_id , $image);
                if($result)
                    return true;
                
                return false;
            }
            return false;
        }
        return false;
    }

    private function addImage($story_id , $image){

        foreach($image as $key => $value){

            $sql = "INSERT INTO storyimages(story_id , image)
                    VALUES ($story_id , '$value')";

            $result = mysqli_query($this->conn , $sql);

            if($result)
                continue;

            return false;
        }
        return true;
    }

    public function deleteStory($story_id){
        
        $sql = "UPDATE story 
                LEFT JOIN storyimages ON story.id = storyimages.story_id 
                LEFT JOIN storycomments ON story.id = storycomments.story_id
                LEFT JOIN storylikes ON story.id = storylikes
                SET story.deleted_at = CURRENT_TIMESTAMP , 
                    storyimages.deleted_at = CURRENT_TIMESTAMP,
                    storycomments.deleted_at = CURRENT_TIMESTAMP,
                    storylikes.deleted_at = CURRENT_TIMESTAMP
                WHERE story.id = $story_id
                ";
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;    
    }

    public function addCategory($title , $image){

        $sql = "INSERT INTO storycategory(title , image)
                Values ('$title' , '$image' ) ;";

        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function updateCategory($category_id , $title , $image){
        if(empty($image))
            $sql = "UPDATE storycategory SET title = $title WHERE id = $category_id";

        else
            $sql = "UPDATE storycategory SET title = $title , image = $image WHERE id = $category_id";
        
        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function deleteCategory($category_id){

        $sql = "UPDATE storycategory LEFT JOIN story 
                ON storycategory.story_id = story.id 
                LEFT JOIN storyimages ON storyimages.id = story.id
                SET storycategory.deleted_at = CURRENT_TIMESTAMP , 
                    story.deleted_at = CURRENT_TIMESTAMP,
                    storyimages.deleted_at = CURRENT_TIMESTAMP
                WHERE storycategory.id = $category_id";
            
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }

    public function deleteComment($comment_id){

        $sql = "UPDATE storycomments SET deleted_at = CURRENT_TIMESTAMP WHERE id = $comment_id";
        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function deleteImage($image_id){
        $sql = "UPDATE  storyimages SET deleted_at = CURRENT_TIMESTAMP WHERE id = $image_id";
        
        $result = mysqli_query($this->conn , $sql );
        
        if($result)
            return true;

        return false;
    }
}

?>