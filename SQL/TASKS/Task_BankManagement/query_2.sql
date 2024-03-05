-- 2) users who don't have any account


SELECT 
    users.id , 
    fullName , 
    email , 
    mobile , 
    gender
FROM
    users 
LEFT JOIN 
    accounts
ON 
    users.id = accounts.user_id
WHERE
    accounts.id IS NULL;


-- subquery / EXISTS
