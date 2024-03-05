


-- 1) post details with user's id wise

SELECT 
    users.id , fullName , email , 
    mobile, gender , posts.id as postId , 
    title , description , posts.created_at , 
    posts.updated_at  
FROM 
    users , posts 
WHERE 
    users.id = posts.user_id;

