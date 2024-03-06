
-- 5) all user's monthly transactions with account details 

-- sagar month totalamount 

SELECT Number , fullName , type,
    COUNT(transactions.id)as totalTransaction , 
    CASE 
    WHEN type = 'credit' THEN SUM(amount) 
    WHEN type = 'debit' THEN SUM(amount) 
    END as totalAmount,
    DATE_FORMAT(transactions.created_at , '%m/%Y') as DATE
FROM users JOIN accounts 
ON users.id = accounts.user_id 
JOIN transactions
ON accounts.id = transactions.account_id
WHERE status = 'successfull' AND fullName = 'sagar jethwa'
GROUP BY DATE , type;

SELECT Number , fullName , email , mobile , transactions.id , amount , type , status , MONTH(transactions.created_at) as MONTHS, YEAR(transactions.created_at) as YEARS
FROM users 
JOIN 
    accounts 
ON users.id = accounts.user_id 
JOIN 
    transactions
ON accounts.id = transactions.account_id
WHERE status = 'successfull'
ORDER BY Years , months;



SELECT user_id , Number , COUNT(transactions.id) , SUM(amount) , MONTH(transactions.created_at) as MONTHS
FROM accounts JOIN transactions
ON accounts.id = transactions.account_id
WHERE status = 'successfull' AND
YEAR(TRANSACTIONS.created_at) = '2024'
GROUP BY MONTHS , user_id;

SELECT * FROM transactions WHERE account_id = 4;