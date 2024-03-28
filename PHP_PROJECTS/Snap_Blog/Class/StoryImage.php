<?php 
class StoryImage extends Connection{

    public function __construct(){
        $this->createConnection();
    }
    
    public function imageDetails($story_id){
        $sql = "SELECT * FROM storyimages WHERE story_id = $story_id AND deleted_at IS NULL";
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function addImage($story_id , $image){
        
        $sql = "INSERT INTO storyimages(story_id , image)
                    VALUES ($story_id , '$image' )";

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