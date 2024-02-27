USE hr;

/*
    In some situations, you want to remove one or more columns from a table. 
    In such cases, you use the following ALTER TABLE DROP COLUMN statement:
        ALTER TABLE table_name
        DROP COLUMN column_name;

    Note that the keyword COLUMN keyword in the DROP COLUMN clause is optional so you can use the shorter statement as follows:
        ALTER TABLE table_name
        DROP column_name;

    To remove multiple columns from a table using a single ALTER TABLE statement, you use the following syntax:

        ALTER TABLE table_name
        DROP COLUMN column_name_1,
        DROP COLUMN column_name_2,
        ...;

    
*/

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title varchar(255) NOT NULL,
    caption VARCHAR(400) ,
    content TEXT,
    created_at DATETIME,
    updated_at DATETIME
);

SELECT * FROM posts;

-- drop column caption 

ALTER TABLE posts 
DROP COLUMN caption;

-- drop multiple columns

ALTER TABLE posts
DROP COLUMN created_at,
DROP COLUMN updated_at;

DESC posts;
 -- both are same to check status of table
DESCRIBE posts;

ALTER TABLE posts
DROP COLUMN id;

DROP TABLE posts;

-- If you remove the column that is a foreign key, MySQL will issue an error.

CREATE TABLE categories(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

ALTER TABLE posts
ADD COLUMN category_id INT NOT NULL AFTER content;

ALTER TABLE posts
ADD CONSTRAINT 
FOREIGN KEY (category_id)
	REFERENCES categories(id);

ALTER TABLE posts
DROP category_id;  -- ERROR cannot drop foreign key 

-- To avoid this error, you must remove the foreign key constraint before dropping the column.


