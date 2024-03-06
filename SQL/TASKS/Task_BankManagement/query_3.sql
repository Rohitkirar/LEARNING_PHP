
-- 3) count of users total bank ACCOUNT

SELECT user_id , count(id) as totalAccount
FROM accounts
GROUP BY user_id;

SELECT users.id , fullName , count(accounts.id) as totalaccount
FROM users , accounts
WHERE users.id = accounts.user_id
GROUP BY users.id;

-- joins 

SELECT users.id , fullName , count(accounts.id) as totalAccount
FROM users JOIN accounts 
ON users.id = accounts.user_id
GROUP BY users.id ;

-- subquery

SELECT users.id , fullName , totalAccount
FROM users JOIN 
(SELECT user_id , count(id) as totalAccount
FROM accounts
GROUP BY user_id) as totalAccountDetails
ON users.id = user_id;

-- EXISTS()

SELECT user_id , count(id)
FROM accounts as a1
WHERE EXISTS(SELECT 1 FROM accounts WHERE a1.user_id = user_id)
GROUP BY user_id;