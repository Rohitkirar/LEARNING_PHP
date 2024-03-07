/*
* PROCEDURE statement
    The DROP PROCEDURE statement deletes a stored procedure created 
    by the CREATE PROCEDURE statement.

DROP PROCEDURE [IF EXISTS] sp_name;

*/

DROP PROCEDURE GetAllProducts;

DROP PROCEDURE IF EXISTS GetAllProducts;

call GetAllProducts;