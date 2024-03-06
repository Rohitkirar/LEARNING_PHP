
-- 4) weekly transaction total amount as per week , monthly and yearly and monthly transactions details

-- weekly

SELECT WEEK(created_at) as weekly, SUM(amount) as totalamount
FROM transactions
WHERE YEAR(created_at) = '2023'
GROUP BY Weekly ;


-- weekly count of transaction

SELECT WEEK(created_at) as weekly , count(id) as totaltransactions
FROM transactions
WHERE YEAR(created_at) = '2023'
GROUP BY weekly ;


-- monthly

SELECT MONTH(created_at) as monthly  , sum(amount) as TotalAmount
FROM transactions
WHERE Year(created_at) = '2024'
GROUP BY  monthly ;

-- monthly total transaction count

SELECT MONTH(created_at) as monthly  ,  count(id) as totaltransaction
FROM transactions
WHERE year(created_at) = '2023'
GROUP BY monthly;

-- yearly 

SELECT YEAR(created_at) as yearly , SUM(amount) as totalAmount 
FROM transactions
GROUP BY yearly  ;

-- yearly total count of transaction
SELECT YEAR(created_at) as yearly , count(id) as totaltransaction
FROM transactions
GROUP BY yearly;

