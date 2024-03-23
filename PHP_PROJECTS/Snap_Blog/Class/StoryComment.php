<?php 
class StoryComment extends Connection{

    public function __construct(){
        $this->createConnection();
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

    public function addComment($commentArray){
        $commentkeyarray = substr(json_encode(array_keys($commentArray)) , 1 , -1) ;
        $commentvaluearray = substr(json_encode(array_values($commentArray)) , 1 , -1);

        $sql = "INSERT INTO storycomments ($commentkeyarray)
                VALUES ($commentvaluearray)";

        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    public function updateComment($story_id , $user_id , $commentArray){

        foreach($commentArray as $key => $value){
            
            $sql = "UPDATE storycomments SET $key = '$value' WHERE story_id = $story_id AND user_id = $user_id";
            
            $result = mysqli_query($this->conn , $sql);
            
            if($result)
                continue;

            return false;
        }
       
        return true;
    }
    
    public function deleteComment($comment_id){

        $sql = "UPDATE storycomments SET deleted_at = CURRENT_TIMESTAMP WHERE id = $comment_id";
        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }
}
?>