
-- 4) weekly transaction total amount as per week , monthly and yearly , 15 days and monthly transactions details

-- weekly

SELECT 
    amount, 
    Year(created_at) as years ,  
    MONTH(created_at) as months, 
    WEEK(created_at) as weekly 
FROM 
    transactions
GROUP BY 
    years , 
    months, 
    id
ORDER BY 
    YEARS , 
    months , 
    weekly ;


-- weekly count of transaction

SELECT 
    Year(created_at) as years ,  
    MONTH(created_at) as months, 
    WEEK(created_at) as weekly , 
    count(id) as totaltransactions
FROM 
    transactions
GROUP BY 
    years , 
    months,
    weekly
ORDER BY 
    YEARS , 
    months , 
    weekly ;


-- monthly

SELECT 
    * , 
    Year(created_at) as Years ,  
    MONTH(created_at) as monthly  
FROM 
    transactions
GROUP BY 
    years , 
    monthly , 
    id
ORDER BY 
    years , 
    monthly , 
    id;

-- monthly total transaction count

SELECT 
    Year(created_at) as Years ,  
    MONTH(created_at) as monthly  ,  
    count(id) as totaltransaction
FROM 
    transactions
GROUP BY 
    years , 
    monthly;

-- yearly 

SELECT 
    * , 
    YEAR(created_at) as yearly 
FROM 
    transactions
GROUP BY 
    yearly , 
    id 
ORDER BY 
    yearly , 
    id;

-- yearly total count of transaction
SELECT 
    YEAR(created_at) as yearly , 
    count(id) as totaltransaction
FROM 
    transactions
GROUP BY 
    yearly;

