/*
In MySQL, an ENUM is a string object whose value is chosen from a list 
of permitted values defined at the time of column creation.

SYNTAX 
    column_name ENUM('value1', 'value2', ..., 'valueN')


*/

-- Suppose you have to store ticket information with the priority: low, 
-- medium, and high. To assign these string values to the priority column, 
-- you can use the ENUM data type.

use classicmodels;

DROP TABLE IF EXISTS tickets;

CREATE TABLE tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    priority ENUM('low' , 'medium' , 'high') NOT NULL
);

-- ehind the scenes, MySQL maps each enumeration member to a numeric index. In this case, it maps the Low, Medium, and High values to 1, 2, and 3 respectively.

INSERT INTO tickets 
    (title , priority)
VALUES 
    ('Scan virus for computer A' , 'high');


-- we also use numeric INDEX

INSERT INTO tickets 
    (title , priority)
VALUES 
    ('Upgrade Window OS for all the computers' , 1 );

INSERT INTO tickets
    (title, priority)
VALUES
    ('Install Google Chrome for Mr. John', 'Medium'),
    ('Create a new user for the new employee David', 'High');     

SELEcT * FROM tickets;

-- you insert a new row without specifying the value for the priority column, 
-- MySQL will use the first enumeration member as the default value.

INSERT INTO tickets
    (title)
VALUES('Refresh the computer of ms.lily');

-- In the non-strict SQL mode, if you insert an invalid value into an ENUM column, 
-- MySQL will use an empty string '' with the numeric index 0 for inserting.

INSERT INTO tickets 
    (title , priority)
VALUES 
    ('secondv Upgrade Window OS for all the computers' , "more" );

-- Note that an ENUM column can accept NULL values if you define it as a nullable column.

SELECT * FROM tickets WHERE priority = 'high';

SELECT * FROM tickets WHERE priority = 1;

-- MySQL sorts ENUM values based on their index numbers. 
-- Therefore, the order of members depends on how they were defined in the enumeration list.


SELECT * FROM tickets ORDER BY priority DESC;

SELECT * FROM tickets ORDER BY priority ;
/*
Advantages of ENUM data type
Data Validation: 
Readability: 
Space Efficiency:

DISADVANTAGES of ENUM data TYPE
Limited Flexibilty
Portability
Maintanance

Use MySQL ENUM for defining columns with a limited set of allowed values.

*/