
-- 9) all user's current account balance

SELECT users.id , fullname , mobile , Number ,
    (
    (SELECT sum(amount) From transactions 
    where type = 'credit' AND accounts.id = account_id )
    -
    (SELECT sum(amount) FROM transactions 
    WHERE type = 'debit' AND accounts.id = account_id ) 
    ) as balance
FROM users JOIN accounts
ON users.id = accounts.user_id
JOIN transactions
ON accounts.id = transactions.account_id
GROUP BY NUMBER;



SELECT 
    users.id , 
    fullname , 
    mobile , 
    Number ,
    (
        COALESCE(
                (SELECT sum(amount) From transactions 
                where 
                    type = 'credit' AND 
                    accounts.id = account_id 
                ) , 0 ) 
        -
        COALESCE(
                (SELECT sum(amount) FROM transactions 
                WHERE 
                    type = 'debit' AND 
                    accounts.id = account_id 
                )  , 0 )
    )       
    as balance
FROM 
    users
JOIN 
    accounts
ON 
    users.id = accounts.user_id
JOIN 
    transactions
ON 
    accounts.id = transactions.account_id
GROUP BY NUMBER;

