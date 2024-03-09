/*
To delete an existing index from a table, you use the DROP INDEX statement as follows:
DROP INDEX index_name 
ON table_name
[algorithm_option | lock_option];

Summary

Use the DROP INDEX statement to remove an existing index.
Use the DROP INDEX `PRIMARY` to remove the primary index.
*/

use test;
SHOW INDEXES FROM employees;

SELECT * FROM employees;

CREATE INDEX name ON employees(name);

CREATE INDEX age ON employees(age);

DROP index name ON employees;


