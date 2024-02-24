use classicmodels;

-- The IN operator returns 1 (true) if the value equals any value in the list (value1, value2, value3,…). Otherwise, it returns 0.
-- The IN operator is functionally equivalent to a combination of multiple OR operators:
-- value = value1 OR value = value2 OR value = value3 OR ...
-- The IN operator allows you to specify multiple values in a WHERE clause.
-- The IN operator is a shorthand for multiple OR conditions.

SELECT * FROM customers;

SELECT  customerName , phone , country 
FROM customers
WHERE country IN ('USA' , 'FRance');

SELECT customerName , phone , country 
FROM customers
WHERE country IN ('AUSTRalia' , 'Poland' , 'sweden')
ORDER BY country;

