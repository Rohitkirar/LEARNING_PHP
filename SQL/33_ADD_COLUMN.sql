USE hr;

/*
	Use MySQL ADD COLUMN clause in the ALTER TABLE statement to add one or more columns to a table.
    
    To add a new column to an existing table, you use the ALTER TABLE … ADD COLUMN statement as follows
        ALTER TABLE table_name
        ADD COLUMN new_column_name data_type 
        [FIRST | AFTER existing_column];

    NOTE : when adding col we have to specify position
        1) FIRST : to add col at first end
        2) AFTER col_name : to add col after specific col_name
        3) default : add col at the end

    To add two or more columns to a table at the same time, you use multiple ADD COLUMN clauses like this:

        ALTER TABLE table_name
        ADD [COLUMN] new_column_name data_type [FIRST|AFTER existing_column],
        ADD [COLUMN] new_column_name data_type [FIRST|AFTER existing_column],
        ...;

*/
CREATE TABLE vendors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(40) NOT NULL
);

SELECT * FROM vendors;

-- specify the AFTER col position to add col

ALTER TABLE vendors
ADD COLUMN phone VARCHAR(15) NOT NULL AFTER name;

DESC vendors; -- to see the description of table

-- to add col at last

ALTER TABLE vendors
ADD COLUMN vendor_group INT NOT NULL;

INSERT INTO vendors (name , phone , vendor_group)
VALUES ('SOHAM' , '39403' , 1) ,
		('HRITIK' , '343490' , 2),
        ('AKASH' , '294802' , 1);
        

-- multiple col add in vendors

ALTER TABLE vendors
ADD COLUMN email VARCHAR(255) NOT NULL,
ADD COLUMN hourly_rate decimal(10 , 2) NOT NULL;


SELECT id , name , phone , vendor_group,email , hourly_rate
FROM vendors;

-- Adding a column that already exists
-- If you add a column that already exists in the table, MySQL will issue an error. 
-- For example, if you execute the following statement:

ALTER TABLE vendors
ADD COLUMN name varchar(40) NOT NULL FIRST; -- ERROR : duplicate column Name

-- For the table with a few columns, it is easy to see which columns are already there. 
-- However, it becomes more difficult for a big table with hundreds of columns.
-- unfortunately ADD COLUMN IF NOT EXISTS  is not available in sql

SELECT 
    IF(count(*) = 1, 'Exist','Not Exist') AS result
FROM
    information_schema.columns
WHERE
    table_schema = 'hr'
        AND table_name = 'vendors'
        AND column_name = 'phone';
        


CREATE TABLE IF NOT EXISTS contacts (
	name VARCHAR(40) NOT NULL
);

INSERT INTO contacts 
VALUES ('ROMAN REIGN'),
		('JOHN CENA');
        
SELECT * FROM contacts;

-- MySQL allows a table to have up to one auto-increment column and that column must be defined as a key.

ALTER TABLE contacts 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY;

-- The output indicates that MySQL automatically generates value for the id column.
