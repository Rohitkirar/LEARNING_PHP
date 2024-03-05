
-- 1) users who have accounts


SELECT 
    users.id , 
    fullName , 
    email , 
    mobile, 
    gender , 
    Number , 
    IFSC 
FROM 
    USERS , 
    accounts
WHERE 
    users.id = accounts.user_id
ORDER BY 
    users.id;


-- using join / subquery / exists 