
-- 6) user's account wise transactions monthly and weekly(only successfuly)
    
-- sagar account no , month + year , total credit and total debit , alltotal 
SELECT Number , fullName , type,
    COUNT(transactions.id)as totalTransaction , 
    SUM(amount) as totalAmount,
    DATE_FORMAT(transactions.created_at , '%m/%Y') as DATE
FROM users JOIN accounts 
ON users.id = accounts.user_id 
JOIN transactions
ON accounts.id = transactions.account_id
WHERE status = 'successfull' AND fullName = 'sagar jethwa'
GROUP BY DATE , type;


-- weekly successfull transaction

SELECT Number , fullName , type,
    COUNT(transactions.id)as totalTransaction , 
    SUM(amount) as totalAmount,
    WEEK(transactions.created_at) as week,
    DATE_FORMAT(transactions.created_at , '%m/%Y') as DATE
FROM users JOIN accounts 
ON users.id = accounts.user_id 
JOIN transactions
ON accounts.id = transactions.account_id
WHERE status = 'successfull' 
GROUP BY week , number;
