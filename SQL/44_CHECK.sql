-- NOTE Before MySQL 8.0.16, the CREATE TABLE allows you to include a table CHECK constraint. 
-- However, MySQL ignores all the CHECK constraints:

/*
    -> Here is the basic syntax:

        CONSTRAINT constraint_name 
        CHECK (expression) 
        [ENFORCED | NOT ENFORCED]

    expression which must be evaluated to TRUE or UNKNOWN for each row of the table inside the parentheses after the CHECK keyword.

    To add a check constraint to an existing table, you use the ALTER TABLE ... ADD CHECK statement:

        ALTER TABLE table_name
        ADD CHECK (expression);

    To remove a CHECK constraint from a table, you use the ALTER TABLE ... DROP CHECK statement:

        ALTER TABLE table_name
        DROP CHECK constraint_name;
*/

USE classicmodels;

SHOW TABLES;

-- Creating CHECK constraints as column constraints

CREATE TABLE parts(
    part_no VARCHAR(18) PRIMARY KEY,
    description VARCHAR(40),
    cost DECIMAL(10,2) NOT NULL CHECK (cost>=0),
    price DECIMAL(10,2) NOT NULL CHECK(price>=0)
);

SHOW CREATE TABLE parts;

DESCRIBE parts;

-- After creating CHECK constraints, if you insert or update a value that causes the Boolean expression to be false, 
-- MySQL rejects the change and issues an error.

INSERT INTO parts(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , -100); -- Error Code: 3819. Check constraint 'parts_chk_2' is not valid

INSERT INTO parts(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 5000 , 2000);

SELECT * FROM parts;

-- Creating CHECK constraints as a table constraints

CREATE TABLE parts2(
    part_no VARCHAR(18) PRIMARY KEY,
    description VARCHAR(40) ,
    cost DECIMAL(10,2) NOT NULL CHECK (cost>=0),
    price DECIMAL(10,2) NOT NULL CHECK(price>=0),
    CONSTRAINT parts_chk_price_gt_cost
        CHECK(price >= cost)  -- table check;
);

INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 5000 , 2000); -- error price should be gt cost price>=cost
        
INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 2000 , 5000); 

SELECT * FROM parts2;

-- To add a check constraint to an existing table, you use the ALTER TABLE ... ADD CHECK statement:

ALTER TABLE parts2 
ADD CONSTRAINT parts2_chk_part_no_notequalto_description
CHECK(part_no != description);

INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-004' , 'A-004' , 3900 , 6900); -- error

SHOW CREATE TABLE parts2;

-- Removing a check constraint from a table

ALTER TABLE parts2
DROP CHECK parts2_chk_part_no_notequalto_description;

