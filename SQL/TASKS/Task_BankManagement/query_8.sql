
-- 8) sum of all pending transaction monthly

    SELECT status , type , SUM(amount) as TotalAmount,
    DATE_FORMAT(transactions.created_at , '%m-%Y') as DATE 
    FROM transactions
    WHERE status = 'pending'
    GROUP BY DATE;




    SELECT status,
        MONTH(created_at) as Months,
        YEAR(created_at) as Years,
    (SELECT sum(amount) From transactions 
    where type = 'credit' AND status = 'pending' AND Months = MONTH(created_at) AND 
    YEARS = YEAR(created_at) )  as TotalCreditAmount,
    (SELECT sum(amount) FROM transactions 
    WHERE type = 'debit' AND status = 'pending' AND MONTHS = MONTH(created_at) AND 
    YEARS = YEAR(created_at))  as TotaldebitAmount
    FROM
        transactions
    WHERE 
        status = 'pending'
    GROUP BY 
        Years , months
;

