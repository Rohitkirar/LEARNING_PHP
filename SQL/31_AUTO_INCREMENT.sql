USE classicmodels;

/*
 1. AUTO_INCREMENT attribute to automatically generate unique numbers for a column 
    each time you insert a new row into the table
 2. Typically, you use the AUTO_INCREMENT attribute for the primary key to ensure 
    each row has a unique identifier.
 3. To get the AUTO_INCREMENT value that MySQL generated for the most recent insert, you use the 
	LAST_INSERT_ID()
 4. To reset the AUTO_INCREMENT value, you use the ALTER TABLE statement:
	ALTER TABLE table_name AUTO_INCREMENT = value;
    
    Note that the ALTER TABLE statement takes effect only if the value that you want to reset to is higher
    than or equal to the maximum value in the AUTO_INCREMENT column of the table_name.
    
 5. you reset the AUTO_INCREMENT column to any number that is less than or equal to last using the ALTER TABLE statement, the operation will have no effects
	
*/


-- CREATE a table with an AUTO_INCREMENT

CREATE TABLE IF NOT EXISTS contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(320) NOT NULL
);

-- AUTO_INCREMENT attribute to the id column to set it as an auto-increment primary key,  
-- means that when you insert a new row into the contacts table without providing a value for the id column,
-- MySQL will automatically generate a unique number for it.


INSERT INTO contacts (name , email)
VALUES('John Doe' , 'john.doe@mysqltutorial.org');


INSERT INTO contacts (name , email)
VALUES('John Doe' , 'john.doe@mysqltutorial.org'),
	  ('John Doe' , 'john.doe@mysqltutorial.org'),
	  ('John Doe' , 'john.doe@mysqltutorial.org');

SELECT * FROM contacts;

-- to get auto_increment value that mysql generated for recent insert, you use LAST_INSERT_ID()

SELECT LAST_INSERT_ID();


ALTER TABLE contacts AUTO_INCREMENT = 10;

INSERT INTO contacts(name, email) 
VALUES('Bob Climo', 'bob.climo@mysqltutorial.org');


CREATE TABLE IF NOT EXISTS subscribers(
	email VARCHAR(320) NOT NULL UNIQUE
);

ALTER TABLE subscribers ADD id INT AUTO_INCREMENT PRIMARY KEY;

SELECT * FROM subscribers;


