
-- 7) sum of all pending transactions
-- using joins  and make query as simple possible

    SELECT 
        (
        SELECT 
            SUM(amount) FROM transactions 
        WHERE 
            type = 'credit' AND
            status = 'pending' 
        ) as TotalCreditAmount,
        
        (
        SELECT 
            SUM(amount) FROM transactions 
        WHERE 
            type = 'debit' AND 
            status = 'pending'
        ) as TotaldebitAmount ,
        status
        FROM 
            transactions
        WHERE 
            status = 'pending'
        GROUP BY 
            status;


    SELECT 
        count(id) as pendingtransaction
    FROM 
        transactions
    WHERE 
        status = 'pending';

    SELECT 
        count(id) as successfulltransaction
    FROM 
        transactions
    WHERE 
        status = 'successfull';
