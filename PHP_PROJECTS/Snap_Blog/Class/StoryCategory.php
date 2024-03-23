<?php 

class StoryCategory extends Connection{

    public function __construct(){
        $this->createConnection();
    }
        
    public function addCategory($categoryArray){
        if(count($categoryArray)>1){
            foreach($categoryArray as $key=>$values){
                $categorykeys = substr(json_encode(array_keys($values)) , 1 , -1);
                $categoryvalues = substr(json_encode(array_values($values)) , 1 , -1);
                
                $sql = "INSERT INTO storycategory($categorykeys)
                        Values ($categoryvalues) ;";

                $result = mysqli_query($this->conn , $sql);
                
                if($result)
                    continue;      
                
                return false;
            }
        }
        else{
            $categorykeys = substr(json_encode(array_keys($categoryArray)) , 1 , -1);
            $categoryvalues = substr(json_encode(array_values($categoryArray)) , 1 , -1);

            $sql = "INSERT INTO storycategory($categorykeys)
                    Values ($categoryvalues) ;";

            $result = mysqli_query($this->conn , $sql);
            
            if($result)
                return true;

        }
        return false;
    }

    public function updateCategory($category_id , $categoryArray){

        foreach($categoryArray as $key => $value){
            $sql = "UPDATE storycategory
                    SET $key = '$value' WHERE id = $category_id ;";

            $result = mysqli_query($this->conn , $sql);
            
            if($result)
                return true;

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
}

?>