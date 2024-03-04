
-- 8) sum of all pending transaction monthly

    SELECT 
        status,
        MONTH(created_at) as Months,
        YEAR(created_at) as Years,
        COALESCE(
                (SELECT sum(amount) From transactions 
                where type = 'credit' AND status = 'pending' AND Months = MONTH(created_at) AND 
                YEARS = YEAR(created_at) ) , 0 ) as TotalCreditAmount,
        COALESCE(
                (SELECT sum(amount) FROM transactions 
                WHERE type = 'debit' AND status = 'pending' AND MONTHS = MONTH(created_at) AND 
                YEARS = YEAR(created_at))  , 0 ) as TotaldebitAmount
    FROM
        transactions
    WHERE 
        status = 'pending'
    GROUP BY 
        Years , months
    HAVING 
        totalcreditAmount > 0 OR totalDebitAmount > 0;

