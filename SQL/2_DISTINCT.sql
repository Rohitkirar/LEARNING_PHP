USE classicmodels;

SELECT first_name , last_name , phone_1 , phone_2
FROM customers_100 
WHERE S_NO > 100 ;

SELECT DISTINCT last_name  , first_name  , phone_1 , phone_2  
FROM customers_100 
WHERE S_No > 100 ;

-- Use DISTINCT keyword inside aggregate function 

SELECT COUNT(DISTINCT country)  
FROM customers_100;



