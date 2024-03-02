/*
MySQL VARCHAR is the variable-length string whose length can be up to 65,535. 
MySQL stores a VARCHAR value as a 1-byte or 2-byte length prefix plus actual data.

The length prefix specifies the number of bytes in the value. 
If a column requires less than 255 bytes

The maximum length, however, is subject to the maximum row size (65,535 bytes) and the character set used. 
It means that the total length of all columns should be less than 65,535 bytes.


*/

USE classicmodels;

DROP TABLE IF EXISTS varchar_test;


-- The output indicates that the row size is too large and the statement fails.

CREATE TABLE varchar_test(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(3)
);

INSERT INTO varchar_test
    (title)
VALUES 
    ('ABCD');

SELECT * FROM varchar_test;

-- MySQL does not implicitly pad space when storing the VARCHAR values. 
-- Additionally, MySQL retains the trailing spaces when inserting or retrieving VARCHAR values. 

INSERT INTO varchar_test
    (title)
VALUES
    ('AB ');

SELECT id , title , length(title)
FROM varchar_test;


-- However, MySQL will truncate the trailing spaces when inserting a VARCHAR value that contains trailing spaces which cause the column length exceeded. In addition, MySQL issues a warning. Let’s see the following example:


INSERT INTO varchar_test
    (title)
VALUES
    ('ABC ');

SELECT id , title, length(title)
FROM varchar_test;


ALTER TABLE varchar_test
MODIFY COLUMN text varchar(10560);

SHOW CREATE TABLE varchar_test;

Update varchar_test
SET text = "he internal representation of a MySQL table has a maximum row size limit of 65,535 bytes, not counting BLOB and TEXT types. BLOB and TEXT columns only contribute 9 to 12 bytes toward the row size limit because their contents are stored separately from the rest of the row. Read more about Limits on Table Column Count and Row Size."
WHERE id =1;

SELECT * FROM varchar_test;

