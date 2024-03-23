<?php 
class StoryImage extends Connection{

    public function __construct(){
        $this->createConnection();
    }
    
    public function imageDetails($story_id){
        $sql = "SELECT image FROM storyimages WHERE story_id = $story_id AND deleted_at IS NULL";
        $result = mysqli_query($this->conn , $sql);

        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function addImage($imageArray){
        if(count($imageArray) > 1){
            foreach($imageArray as $key => $values){

                $imagearraykeys = substr(json_encode(array_keys($values)) , 1 , -1);
                $imagearrayvalues = substr(json_encode(array_values($values)) , 1 , -1);
                
                $sql = "INSERT INTO storyimages($imagearraykeys)
                        VALUES ($imagearrayvalues)";

                $result = mysqli_query($this->conn , $sql);

                if($result)
                    continue;

                return false;
            }
            return true;
        }
        else{
            $imagearraykeys = substr(json_encode(array_keys($imageArray)) , 1 , -1);
            $imagearrayvalues = substr(json_encode(array_values($imageArray)) , 1 , -1);
            $sql = "INSERT INTO storyimages($imagearraykeys)
                        VALUES ($imagearrayvalues)";

                $result = mysqli_query($this->conn , $sql);

                if($result)
                    return true;
        }
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