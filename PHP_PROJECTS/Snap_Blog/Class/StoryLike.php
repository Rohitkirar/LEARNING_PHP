<?php 

class StoryLike extends Connection{

    function __construct(){
        $this->createConnection();
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

    public function likeCount($story_id){
        
        $sql = "SELECT story_id , count(id) as total_like FROM storyLikes WHERE deleted_at IS NULL GROUP BY story_id";
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            return mysqli_fetch_all($result , MYSQLI_ASSOC);
        }
        return false;
    }
    
    public function addLike($user_id , $story_id ){

        $sql = "SELECT id as like_id , deleted_at FROM storylikes WHERE user_id = $user_id AND story_id = $story_id ";
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
                    VALUES ($user_id , $story_id) ";
        }
        $result = mysqli_query($this->conn , $sql);

        if($result)
            return true;

        return false;
    }

    public function deleteLike( $like_id){

        $sql = "UPDATE storylikes SET deleted_at = DEFAULT 
                WHERE id = $like_id ";

        $result = mysqli_query($this->conn , MYSQLI_ASSOC);
        if($result)
            return true;

        return false;
    }
}
?>