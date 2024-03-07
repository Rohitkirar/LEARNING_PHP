/*
The SHOW FUNCTION STATUS is like the SHOW PROCEDURE STATUS but for the stored functions.

-> to list all function stored in DATABASE
SHOW FUNCTION STATUS ;

SYNTAX 

SHOW FUNCTION STATUS 
[LIKE 'pattern' | WHERE search_condition];

*/
SHOW FUNCTION STATUS ;

SHOW FUNCTION STATUS LIKE 'cus%';

SHOW FUNCTION STATUS WHERE NAME = 'customerLevel';

SHOW FUNCTION STATUS WHERE db = 'classicmodels';
