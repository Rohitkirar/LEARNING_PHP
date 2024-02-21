USE classicmodels;

-- Note: A NULL value is different from a zero value or a field that contains spaces. 
-- A field with a NULL value is one that has been left blank during record creation!
-- To test whether a value is NULL or not, you use the  IS NULL operator.
-- It is not possible to test for NULL values with comparison operators, such as =, <, or <>

SELECT 1 IS NULL,  -- 0
       0 IS NULL,  -- 0
       NULL IS NULL; -- 1
       
SELECT 1 IS NOT NULL, -- 1
       0 IS NOT NULL, -- 1
       NULL IS NOT NULL; -- 0
       
SELECT * FROM customers;

SELECT * FROM customers
WHERE salesRepEMployeeNumber IS NULL 
ORDER BY customerName;


SELECT * FROM customers 
WHERE salesRepEMployeeNumber IS NOT NULL
ORDER BY customerName;

-- A field with a NULL value is a field with no value.
-- If a field in a table is optional, 
-- it is possible to insert a new record or update a record without adding a value to this field. 
-- Then, the field will be saved with a NULL value.