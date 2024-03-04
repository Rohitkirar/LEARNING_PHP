/*
    The MySQL DECIMAL data type allows you to store exact numeric values in the database. 
    In practice, you often use the DECIMAL data type for columns that preserve exact precision e.g., monetary data in financial systems.

    To define a column whose data type is DECIMAL, you use the following syntax:

    column_name DECIMAL(P,D);

    P is the precision that represents the number of significant digits. 
    The range of P is 1 to 65.

    D represents the no of digits after decimal Point
    The range of D is 0 and 30. 

    MySQL requires that D is less than or equal to (<=) P.

    The DECIMAL(P,D) means that the column can store up to P digits with D decimals

    Besides the DECIMAL keyword, you can also use DEC, FIXED, or NUMERIC 
    because they are synonyms for DECIMAL.

    column_name DECIMAL(P);  equivalent to:  column_name DECIMAL(P,0);

    In this case, the column contains no fractional part or decimal point.

    In addition, you can even use the following syntax:

    column_name DECIMAL;  =  column_name DECIMAL(10,0);

    The default value of P is 10 and D is 0, which is equivalent to the following:

    For example, DECIMAL(19,9) has 9 digits for the fractional part and 19-9 = 10 digits for the integer part. The fractional part requires 4 bytes. The integer part requires 4 bytes for the first 9 digits, for 1 leftover digit, 
    it requires 1 more byte. In total, the DECIMAL(19,9) column requires 9 bytes.
*/

USE classicmodels;

DROP TABLE IF EXISTS materials;

CREATE TABLE IF NOT EXISTS materials(
    id INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(255) NOT NULL,
    cost DECIMAL(19,4) NOT NULL
);

INSERT INTO materials
    (text , cost)
VALUES
    ('Bicycle' , 15567.34),
    ('Seat' , 230.634),
    ('Break' , 120.45);

SELECT * FROM materials;

CREATE TABLE IF NOT EXISTS materials_details(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DEC(10,2) NOT NULL  -- similar to decimal, numeric
);

INSERT INTO materials_details
    (name , price)
VALUES  
    ('bat' , 1000.234),
    ('ball' , 3424.34029),
    ('carrom' , 3242.3),
    ('chess' , 322);

SELECT * FROM materials_details;







