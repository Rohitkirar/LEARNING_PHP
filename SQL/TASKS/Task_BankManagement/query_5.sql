
-- 5) all user's monthly transactions with account details 

-- sagar month totalamount 

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
