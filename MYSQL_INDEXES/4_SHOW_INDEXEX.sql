/*
To query the index information of a table, you use the SHOW INDEXES statement as follows:

SHOW INDEXES FROM table_name;

*/

SHOW INDEXES FROM employees;

SHOW INDEXES FROM test.employees;

SHOW INDEX IN table_name 
FROM database_name;

SHOW KEYS FROM tablename
IN databasename;

-- filter the index information
SHOW INDEXES FROM table_name
WHERE condition;

-- invisible index 
SHOW INDEXES FROM table_name
WHERE VISIBLE = 'NO';


SELECT * FROM employees;


EXPLAIN SELECt * FROM employees WHERE NAME = 'JOHN CENA';

CREATE INDEX name_index ON employees(name);

SELECT * FROM employees WHERE name = 'JOHN CENA';



