/*
SHOW TRIGGERS statement list triggers defined for tables in the current database. 
basic syntax of the SHOW TRIGGERS statement:

SHOW TRIGGERS
[{FROM | IN} database_name]
[LIKE 'pattern' | WHERE search_condition];
*/;

-- SHOW TRIGGERS returns all triggers in all databases:
SHOW TRIGGERS;


-- To show all triggers in a specific database, database name after the FROM or IN;

SHOW TRIGGERS FROM classicmodels; 

SHOW TRIGGERS IN classicmodels;

-- list triggers according to a pattern, you use the LIKE clause:

SHOW TRIGGERS LIKE 'pattern';

SHOW TRIGGERS FROM db_name LIKE 'pattern';

-- To find triggers that match a condition, you use the WHERE clause:

SHOW TRIGGERS 
WHERE search_condition;

SHOW TRIGGERS 
FROM database_name
WHERE search_condition;
