-- 2) users who don't have any account


SELECT users.id , fullName , email , mobile , gender
FROM users LEFT JOIN accounts
ON users.id = accounts.user_id
WHERE accounts.id IS NULL;



-- subquery

SELECT users.id , users.fullName 
FROM users 
WHERE users.id NOT IN (SELECT DISTINCT user_id FROM accounts);


-- EXISTS()

SELECT id , fullName 
FROM users
WHERE NOT EXISTS(SELECT 1 FROM accounts WHERE users.id = user_id);


