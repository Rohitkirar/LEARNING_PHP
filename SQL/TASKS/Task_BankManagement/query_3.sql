
-- 3) count of users total bank ACCOUNT

SELECT 
    users.id , 
    fullName , 
    count(accounts.id) as totalaccount
FROM
    users , accounts
WHERE 
    users.id = accounts.user_id
GROUP BY 
    users.id;
