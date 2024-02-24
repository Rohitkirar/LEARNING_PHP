USE classicmodels;

-- TASK 1. Retrieve all customers who haven't placed any orders yet.

SELECT c.customerNumber , 
        c.customerName , 
        o.orderNumber
FROM
        customers AS c
LEFT JOIN 
        orders AS o
ON c.customerNumber = o.customerNumber
AND orderNumber IS NULL ;

-- TASK 2. Provide a list of customers along with their product details for orders pending payment

SELECT c.customerNumber , c.customerName, 
        p.productName,
        o.status
FROM 
        customers AS c 
JOIN    orders AS o 
ON c.customerNumber = o.customerNumber
AND status = 'on hold'
JOIN    orderdetails AS od
USING(orderNumber)
JOIN    products AS p
USING(productCode)


-- TASK 2. (COUNT) Provide a list of customers along with their product details for orders pending payment

SELECT c.customerNumber , c.customerName, 
        count(productCode),
        o.status
FROM 
        customers AS c 
JOIN    orders AS o 
ON c.customerNumber = o.customerNumber
AND status = 'on hold'
JOIN    orderdetails AS od
USING(orderNumber)
GROUP BY c.customerNumber;


-- TASK 3. Generate a list of customers with their product details for orders that have been shipped

SELECT
        c.customerNumber,
        c.customerName,
        p.productName,
        o.status
FROM
        customers AS c
JOIN
        orders AS o
ON
        c.customerNumber = o.customerNumber
AND
        o.status = 'shipped'
JOIN
        orderdetails AS od
USING   
        (orderNumber)
JOIN 
        products AS p
USING
        (productCode)
LIMIT 30;

-- TASK 3. ( COUNT )Generate a list of customers with their product details for orders that have been shipped

SELECT
        c.customerNumber,
        c.customerName,
        COUNT(productCode) AS totalProduct,
        o.status
FROM
        customers AS c
JOIN
        orders AS o
ON
        c.customerNumber = o.customerNumber
AND
        o.status = 'shipped'
JOIN
        orderdetails AS od
USING   
        (orderNumber)
GROUP BY
        c.customerNumber;

-- TASK 4.Extract CustomerName, CustomerFullAddress, ProductName, EmployeeOfficeCode, and OrderSubtotal for orders placed but where payment has not been finaliz 

SELECT c.customerName,
        -- CONCAT_WS(' ',c.addressline1 , c.city ,c.postalCode , c.state , c.country) AS fullAddress, --return only non null value
        CONCAT(c.addressline1 , ', ' ,  c.city , ', ' , c.postalCode, ', ' , c.state, ', ' , c.country) AS fullAddress,
        p.productName,
        e.OfficeCode,
        SUM(od.quantityOrdered*od.priceEach) AS orderSubTotal
FROM
        customers AS c 
JOIN 
        employees AS e
ON 
        c.salesRepEmployeeNumber = e.employeeNumber
JOIN
        orders AS o 
ON
        c.customerNumber = o.customerNumber
AND 
        o.status = 'on hold'
JOIN
        orderdetails AS od
USING
        (orderNumber)
JOIN
        products AS p
USING 
        (productCode)
GROUP BY 
        c.customerNumber,
        p.productName ;