
-- 7) sum of all pending transactions
-- using joins  and make query as simple possible

    SELECT status , type , SUM(amount) as TotalAmount 
    FROM transactions
    WHERE status = 'pending'
    GROUP BY status , type;


    SELECT status , type , count(id) as pendingtransaction
    FROM transactions
    WHERE status = 'pending'
    GROUP BY type;

    SELECT status , type , count(id) as pendingtransaction
    FROM transactions
    WHERE status = 'successfull'
    GROUP BY type;
