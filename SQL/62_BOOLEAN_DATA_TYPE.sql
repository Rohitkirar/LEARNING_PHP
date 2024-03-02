/*
    MySQL does not have a dedicated Boolean data type. Instead, MySQL uses TINYINT(1) to represent the BOOLEAN data type.

    To make it more convenient when defining BOOLEAN column, MySQL offers BOOLEAN or BOOL as the synonym for TINYINT(1).

    Boolean literals, you can use the constants true and false case-insensitively, which is equivalent to 1 and 0 respectively. 

*/

SELECT true , false , true , false , false;

USE classicmodels;

DROP TABLE IF EXISTS Sports_items;

CREATE TABLE IF NOT EXISTS Sports_items(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    available BOOLEAN
); 

-- when we see descibe table the datatype is tinyInt(1)

DESC Sports_items;

INSERT INTO sports_items
    (name , available)
VALUES
    ('bat' , true),
    ('ball' , true),
    ('badminton' , true),
    ('football' , false),
    ('cricket kit ' , false);


SELECT * FROM Sports_items;

-- The output indicates that MySQL converted the true and false to 1 and 0 respectively.

-- Fourth, because BOOLEAN is TINYINT(1), you can insert values other than 1 and 0 into the BOOLEAN column. For example:

INSERT INTO sports_items
    (name , available)
VALUES
    ('redball' , 13);

-- testing bool with null VALUE

INSERT INTO sports_items 
    (name)
VALUES 
    ('hocketstick');  -- it store null in available COL



-- If you want to output the result as true and false, you can use the IF function as follows:

SELECT 
    id , 
    name ,
    IF(available , 'true' , 'false') as available
FROM 
    Sports_items;


-- retrieving DATA

SELECT * FROM sports_items
WHERE available = true;

SELECT * FROM sports_items
WHERE available = false;

-- The query returned the task with completed value 1. 
-- It does not show the task with the completed value 2 because TRUE is 1, not 2.

-- To fix it, you can use the IS operator:

SELECT * FROM sports_items
WHERE available IS TRUE;

SELECT * FROM sports_items
WHERE available IS NOT TRUE; -- include null value also

SELECT * FROM sports_items
WHERE available IS FALSE; -- include not null value

