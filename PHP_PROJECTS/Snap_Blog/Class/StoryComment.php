<?php 
class StoryComment extends Connection{

    public function __construct(){
        $this->createConnection();
    }

    public function commentDetails($story_id=null){
        if($story_id){
            $sql = "SELECT storycomments.id as comment_id , content , user_id , CONCAT(first_name , ' ' , last_name) as full_name , story_id 
                FROM storycomments JOIN users ON user_id = users.id AND story_id = $story_id 
                WHERE  storycomments.deleted_at IS NULL ORDER BY updated_at DESC";
        }
        else{
            $sql = "SELECT storycomments.id as comment_id , content , user_id ,  story_id 
                FROM storycomments
                WHERE  storycomments.deleted_at IS NULL ORDER BY updated_at DESC";
        }
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function addComment($commentArray){

        $commentkeyarray = implode("," , array_keys($commentArray));
        $commentvaluearray = substr(json_encode(array_values($commentArray)) , 1 , -1);

        $sql = "INSERT INTO storycomments ($commentkeyarray)
                VALUES ($commentvaluearray)";

        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;

        return false;
    }

    public function updateComment($comment_id , $editCommentContent){
        
        $sql = "UPDATE storycomments SET content = '$editCommentContent' WHERE id = $comment_id";
        
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

    public function commentCount($story_id){

        $sql = "SELECT story_id , COUNT(id) as total_comment 
                FROM storycomments WHERE deleted_at IS NULL AND story_id = $story_id
                GROUP BY story_id";

        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            return mysqli_fetch_assoc($result);
        }

        return false;
    }
}
?>