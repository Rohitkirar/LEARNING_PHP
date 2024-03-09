/*
To create a UNIQUE index, you use the CREATE UNIQUE INDEX statement as follows:

CREATE UNIQUE INDEX index_name
ON table_name(index_column_1,index_column_2,...);

MySQL provides another kind of index called UNIQUE index that allows you to enforce
 the uniqueness of values in one or more columns. 

MySQL considers NULL values as distinct values. Therefore, you can have multiple 
NULL values in the UNIQUE index.

In this tutorial, you have learned how to use the MySQL UNIQUE index to prevent 
duplicate values in the database
*/;

-- 3 ways we declare unique INDEX

-- use table creation add unique key in col
    CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL,
        UNIQUE KEY(email)
    );

-- using alter table command
    ALTER TABLE table_name
    ADD CONSTRAINT constraint_name 
    UNIQUE KEY(column_1,column_2,...);

-- using create Unique INDEX
    CREATE UNIQUE INDEX idx_name_phone
    ON contacts(first_name,last_name,phone);

use hr;

show tables;

DROP TABLE IF EXISTS contacts;

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    UNIQUE KEY(email)
);

INSERT INTO contacts(id)
VALUES(1);
INSERT INTO contacts(id , email)
VALUES(3 , 'rk1223');
INSERT INTO contacts(id , email)
VALUES(2 , 'rk1223');

SELECT * FROM contacts;

SHOW INDEXES FROM contacts;

CREATE UNIQUE INDEX y ON contacts(email);
CREATE UNIQUE INDEX f ON contacts(id);