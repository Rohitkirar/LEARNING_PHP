USE classicmodels;

-- The table employees stores not only employees’ data but also the organization’s data. It uses the reportsto column to determine the manager id of an employee.

SELECT e.employeeNumber , CONCAT(e.firstName , ' ' , e.lastName) as EmpfullName, e.reportsTo,t.employeeNumber as trainerNumber,
CONCAT(t.firstName , ' ' , t.lastName) as TrainerName 
FROM employees AS e
JOIN employees AS t
ON t.employeeNumber = e.reportsTo ;


-- compare the trainer and the employee current jobtitle

SELECT e.employeeNumber , CONCAT(e.firstName , ' ' , e.lastName) as EmpFullName, e.jobTitle,
t.employeeNumber as TrainerNumber , CONCAT(t.firstName , ' ' , t.lastName) as TrainerFullName , t.jobtitle
FROM employees AS e 
JOIN 
employees AS t
ON e.reportsTo  = t.employeeNumber;

-- another way of using self join without using join 

SELECT e.employeeNumber , CONCAT(e.firstName , ' ' , e.lastName) as EmpFullName, e.jobTitle,
t.employeeNumber as TrainerNumber , CONCAT(t.firstName , ' ' , t.lastName) as TrainerFullName , t.jobtitle
FROM employees AS e , employees AS t
WHERE e.reportsTo  = t.employeeNumber;

SELECT 
	IFNULL(CONCAT(m.firstName , ' ' , m.lastName), 'TOP MANAGER') AS 'Manager',
    CONCAT(e.firstName , ' ' , e.lastName) AS 'Direct Report TO '
FROM employees e 
LEFT JOIN employees m
ON m.employeeNumber = e.reportsto
ORDER by manager;

-- using self join to compare successive rows within the same table

SELECT c1.city,
	c1.customerName,
    c2.customerName
FROM
	customers c1
INNER JOIN customers c2 
ON c1.city = c2.city
	AND c1.customername > c2.customerName
ORDER BY
	c1.city;

-- finding customers from same city
    
SELECT c1.city , c1.customerName AS customerName1,
	c2.customerName AS customerName2
FROM customers AS c1 , customers AS c2 
WHERE c1.customerNumber != c2.customerNumber 
AND c1.city = c2.city;
    


/*
The MySQL self-join is a technique that joins a table to itself.
Use table aliases and inner join or left join to perform a self join in MySQL.
 -> self join allows you to join a table to itself.
	Since MySQL does not have specific self join syntax, 
	you need to perform a self join via a regular join such as left join or inner join.
 -> Since you reference the same table within a single query, 
	you need to use table aliases to assign the table a temporary name 
    when you reference it for the second time.
 -> To perform a self join, you follow these steps:
	1) Alias a table: Assign each instance of the table a unique alias to differentiate between them.
	2) Specify the join condition: Define how the rows from each instance of the table should be compared. 
		In a self join, you typically compare values in columns within the same table.
	3)Select the desired columns: specify the columns that you want to include in the final result set.
*/