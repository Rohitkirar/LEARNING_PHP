
-- 6) user's account wise transactions monthly and weekly(only successfuly)
    -- sagar account no , month + year , total credit and total debit , alltotal 
    SELECT users.id as userID , fullName  , Number AS ACCOUNTNUMBER , count(transactions.id) as totaltransaction , 
        MONTH(transactions.created_at) as MONTHS, YEAR(transactions.created_at) as YEARS,
        status,
        COALESCE(
                (SELECT sum(amount) From transactions 
                where type = 'credit' AND status = 'successfull' AND Months = MONTH(created_at) AND 
                YEARS = YEAR(created_at) ) , 0 ) as TotalCreditAmount,
        COALESCE(
                (SELECT sum(amount) FROM transactions 
                WHERE type = 'debit' AND status = 'successfull' AND MONTHS = MONTH(created_at) AND 
                YEARS = YEAR(created_at))  , 0 ) as TotaldebitAmount
    FROM users 
    JOIN 
        accounts 
    ON users.id = accounts.user_id 
    JOIN 
        transactions
    ON accounts.id = transactions.account_id AND
        status = 'successfull' 
    GROUP BY users.id ,  YEARS  ,MONTHS
    HAVING  (TotalcreditAmount > 0 OR TOTALdebitAMount > 0)  ;

-- weekly successfull transaction
    SELECT users.id as userID , fullName , Number AS ACCOUNTNUMBER , count(transactions.id) as totaltransaction , 
        WEEK(transactions.created_at) as weeks,
        MONTH(transactions.created_at) as MONTHS,
        YEAR(transactions.created_at) as YEARS, 
        status,
        COALESCE(
                (SELECT sum(amount) From transactions 
                where type = 'credit' AND status = 'successfull' AND Months = MONTH(created_at) AND 
                YEARS = YEAR(created_at) ) , 0 ) as TotalCreditAmount ,
        COALESCE(
                (SELECT sum(amount) FROM transactions 
                WHERE type = 'debit' AND status = 'successfull' AND MONTHS = MONTH(created_at) AND 
                YEARS = YEAR(created_at))  , 0 ) as TotaldebitAmount
    FROM
        users 
    JOIN 
        accounts 
    ON 
        users.id = accounts.user_id 
    JOIN 
        transactions
    ON 
        accounts.id = transactions.account_id AND
        status = 'successfull' 
    GROUP BY 
        users.id ,  YEARS  ,MONTHS, weeks
     HAVING 
        (TotalcreditAmount > 0 OR TOTALdebitAMount > 0) ;
