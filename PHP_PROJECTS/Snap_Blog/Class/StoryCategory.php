<?php 

class StoryCategory extends Connection{

    public function __construct(){
        $this->createConnection();
    }
        
    public function addCategory($categoryArray){

        $title = addslashes($categoryArray['title']);
        $image = $categoryArray['image'];
        
        $sql = "INSERT INTO storycategory(title , image)
                Values ('$title' , '$image') ;";

        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function updateCategory($category_id , $categoryArray){

        $title = addslashes($categoryArray['title']);
        $image = $categoryArray['image'];

        $sql = "UPDATE storycategory
                SET title = '$title' , image = '$image' , deleted_at = DEFAULT WHERE id = $category_id ;";

        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return true;

        return false;
    }

    public function categoryDetails($category_id = null , $allcategorydata = false){
        
        if($category_id)
           $sql = "SELECT * , IF(deleted_at , 0 , 1 ) as status FROM storycategory WHERE id = $category_id";
        
        elseif($allcategorydata)
            $sql = "SELECT * , IF(deleted_at , 0 , 1 ) as status FROM storycategory ORDER BY updated_at DESC ";
        
        else
            $sql = "SELECT * , IF(deleted_at , 0 , 1 ) as status FROM storycategory WHERE deleted_at IS NULL ORDER BY updated_at DESC ";
        

        $result = mysqli_query($this->conn , $sql );
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }


    public function deleteCategory($category_id){

        $sql = "UPDATE storycategory 
                LEFT JOIN story ON storycategory.id = story.category_id 
                LEFT JOIN storyimages ON storyimages.id = story.id
                SET storycategory.deleted_at = CURRENT_TIMESTAMP 
                WHERE storycategory.id = $category_id";
            
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }
}

?>