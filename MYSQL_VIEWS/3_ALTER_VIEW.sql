/*
ALTER VIEW statement changes the definition of an existing view. 
The syntax of the ALTER VIEW is similar to the CREATE VIEW statement:

ALTER
    [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    VIEW view_name [(column_list)]
    AS select_statement;

OR WE CAN USE

CREATE OR REPLACE
    [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    VIEW view_name [(column_list)]
    AS select_statement;
*/

CREATE VIEW salesOrders AS
    SELECT 
        orderNumber, productCode, quantityOrdered,  priceEach,  status
    FROM orders
    INNER JOIN orderDetails 
    USING (orderNumber);

SELECT * FROM salesOrders;

-- remove status COLUMN from view

ALTER VIEW salesOrders AS
    SELECT 
        orderNumber, productCode, quantityOrdered,  priceEach
    FROM orders
    INNER JOIN orderDetails 
    USING (orderNumber);

SELECT * FROM salesOrders;


CREATE OR REPLACE VIEW salesOrders AS 
    SELECT 
        orderNumber, productCode
    FROM orders
    INNER JOIN orderDetails 
    USING (orderNumber);

SELECT * FROM salesOrders;

-- 2 way : combine quantityordered and price to one COL

CREATE OR REPLACE VIEW salesOrders AS 
    SELECT 
        orderNumber, productCode, (quantityOrdered * priceEach) as total
    FROM orders
    INNER JOIN orderDetails 
    USING (orderNumber);

SELECT * FROM salesOrders;


