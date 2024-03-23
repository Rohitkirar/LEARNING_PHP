<?php 

class Story extends Connection{
    private $admin_id ;

    public function __construct($admin_id = null ){
        $this->createConnection() ;  
        if($admin_id)
            $this->admin_id = $admin_id ;
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
        elseif(isset($this->admin_id)){
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id AND story.user_id = $this->admin_id
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

    public function addStory($storyArray){

        $storykeyarray = substr(json_encode(array_keys($storyArray)) , 1 , -1);
        $storyvaluesarray = substr(json_encode(array_values($storyArray)) , 1 , -1);
        

        $sql = "INSERT INTO story ($storykeyarray)
                VALUES  ($storyvaluesarray);";

        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;
        
        return false;
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
    
}

?>