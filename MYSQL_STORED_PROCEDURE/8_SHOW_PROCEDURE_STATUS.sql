/*
basic syntax of SHOW PROCEDURE STATUS

SHOW PROCEDURE STATUS [LIKE 'pattern' | WHERE search_condition] 
*/
SHOW PROCEDURE status;

--  to show stored procedures in a particular database, 
-- you can use a WHERE clause

SHOW PROCEDURE STATUS WHERE Db = 'classicmodels';

SHOW PROCEDURE STATUS WHERE Db = 'classicmodels';

--  find stored procedures whose names contain a specific word, 
-- you can use the LIKE clause 
-- SHOW PROCEDURE STATUS LIKE '%pattern%'

SHOW PROCEDURE STATUS LIKE 'GET%';

SHOW PROCEDURE STATUS LIKE 'Create%';


-- The routines table in the information_schema database contains all information on the stored procedures and stored functions of all databases in the current MySQL server.