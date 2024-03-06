-- Active: 1709188058198@@127.0.0.1@3306@accountmanagement

-- 1) users who have accounts


SELECT users.id , fullName , email , mobile, gender , Number , IFSC 
FROM USERS , accounts
WHERE users.id = accounts.user_id
ORDER BY users.id;


-- using join 

SELECT DISTINCT users.id , users.fullName 
FROM users INNER JOIN accounts 
ON users.id = accounts.user_id;

--  subquery  
SELECT id , fullName 
FROM users 
WHERE id IN (SELECT DISTINCT user_id FROM accounts);

-- EXISTS
SELECT id , fullName
FROM users
WHERE EXISTS(SELECT 1 FROM accounts WHERE users.id = user_id);


SELECT * FROM users;

SELECT * FROM accounts;