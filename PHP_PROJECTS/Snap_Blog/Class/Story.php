<?php 
class Story extends Connection{
    private $admin_id ;

    public function __construct($admin_id = null ){
        $this->createConnection() ;  
        if($admin_id)
            $this->admin_id = $admin_id ;
    }
    public function getAllStoryData(){
        $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content , story.created_at , story.updated_at , story.deleted_at
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id
                    ORDER BY story.created_at DESC;";
        $result = mysqli_query($this->conn , $sql);
        
        if(mysqli_num_rows($result))
            return $result ;
        
        return false;
    }
    
    public function storyDetails($story_id = null , $category_id = null){
        if($story_id){
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id AND story.id = $story_id
                    ;";
                
        }
        elseif($category_id){
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content 
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id AND storycategory.id = $category_id
                    WHERE storycategory.deleted_at IS NULL AND story.deleted_at IS NULL ORDER BY story.created_at DESC;";
        }
        else{
            $sql = "SELECT story.id as story_id , storycategory.id as category_id , 
                    story.title as story_title ,  storycategory.title as category_title , 
                    story.content as story_content 
                    FROM story JOIN storycategory 
                    ON story.category_id = storycategory.id
                    WHERE storycategory.deleted_at IS NULL AND story.deleted_at IS NULL ORDER BY story.created_at DESC;";
                
        }

        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)>0){
            $result = mysqli_fetch_all($result , MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }

    public function addStory($user_id , $storyArray){
        
        $title = addslashes($storyArray['title']);
        $content = addslashes($storyArray['content']);

        $sql = "INSERT INTO story (user_id , category_id , Title , content)
                VALUES( $user_id , {$storyArray['category_id']} , '$title' , '$content')";

        $result = mysqli_query($this->conn , $sql);
        
        if($result)
            return mysqli_insert_id($this->conn);
        
        return false;
    }

    public function updateStory($story_id  , $storyArray){

        $title = addslashes($storyArray['title']);
        $content = addslashes($storyArray['content']);

        $sql = "UPDATE story
                SET category_id = {$storyArray['category_id']} ,
                    title = '$title' ,
                    content = '$content' ,
                    deleted_at = DEFAULT
                WHERE id = $story_id";
                
        $result = mysqli_query($this->conn , $sql);
        if($result)
            return true;
        
        return false;
    }

    public function deleteStory($story_id){
        
        $sql = "UPDATE story 
                LEFT JOIN storyimages ON story.id = storyimages.story_id 
                LEFT JOIN storycomments ON story.id = storycomments.story_id
                LEFT JOIN storylikes ON story.id = storylikes.story_id
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
    
    public function totalCountInRange($startrange , $endrange){
        $Countarray = [];
        $sql = "SELECT count(id) as like_count  From StoryLikes WHERE deleted_at IS NULL AND DATE(created_at) BETWEEN '$startrange' AND '$endrange' "; 
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_assoc($result);
            $Countarray['like_count'] = $result['like_count'];
        }else
            $Countarray['like_count'] = 0 ; 

        $sql = "SELECT count(id) as user_count From Users WHERE deleted_at IS NULL AND role != 'admin' AND DATE(created_at) BETWEEN '$startrange' AND '$endrange'  "; 
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_assoc($result);
            $Countarray['user_count'] = $result['user_count'];
        }else
            $Countarray['user_count'] = 0;


        $sql = "SELECT count(id) as comment_count FROM StoryComments WHERE deleted_at IS NULL AND DATE(created_at) BETWEEN '$startrange' AND '$endrange'  " ;
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_assoc($result);
            $Countarray['comment_count'] = $result['comment_count'];
        }
        else
            $Countarray['comment_count'] = 0;

        $sql = "SELECT count(id) as story_count FROM Story WHERE deleted_at IS NULL AND DATE(created_at) BETWEEN '$startrange' AND '$endrange' " ; 
        $result = mysqli_query($this->conn , $sql);
        if(mysqli_num_rows($result)){
            $result = mysqli_fetch_assoc($result);
            $Countarray['story_count'] = $result['story_count'];
        }
        else 
            $Countarray['story_count'] = 0;


        return $Countarray;
    }
}

?>