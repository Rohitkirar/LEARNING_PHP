/*
    The INSERT statement allows you to insert one or more rows into a table.
        
        INSERT INTO table_name(column1, column2,...) 
        VALUES (value1, value2,...);

*/


USE classicmodels;

SHOW TABLES;

SELECT * FROM customers_100 WHERE customer_id = null;

-- insert data into table mentionally column here

INSERT INTO customers_100 
(S_No , customer_id ,First_name , last_name , company , city , country , phone_1 , phone_2 , email , subscription_date , Website)
VALUES
('102' , 'hhhhh' ,  'Harsh' , 'Shrivastav' , 'quality quoisk' , 'bhopal' , 'India' ,
 1234 , 4321 , 'harsh123@gmail.com' , '01-02-2023' , 'www.harsh.com/' );

-- insert data into data without mention column externally

INSERT INTO customers_100 
VALUES
(101 , 'aaaaa' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' ,
 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/') ;

use hr;

show tables;

CREATE TABLE IF NOT EXISTS tasks(
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    due_date DATE,
    priority TINYINT NOT NULL DEFAULT 3,
    description TEXT
);

INSERT INTO tasks(title , priority)
VALUES ('Learn Mysql Insert statement' , 1);

SELECT * FROM tasks;

-- inserting rows using DEFAULT

INSERT INTO tasks(title , priority)
VALUES ('understanding default keyword' ,Default);


DELETE FROM tasks
WHERE task_id = 2;

--  Inserting dates into the table example To insert a literal date value into a column, you use the following format:
-- 'YYYY-MM-DD' format

INSERT INTO tasks 
(title , start_date , due_date)
VALUES
    ('insert date into table' , '2018-01-09' , '2018-10-10');

INSERT INTO tasks
(title , start_date , due_date)
VALUES 
    ('validating date format' , '18/3/03' , '03/10/23');

SELECT * FROM tasks;

INSERT INTO tasks
(title , start_date , due_date)
VALUES ('using current_date fun' , CURRENT_DATE , null);

-- autoincremnt COLUMN
INSERT INTO tasks VALUES();

-- Use the INSERT statement to insert one or more rows in TABLE


 -- insert multiple row from single query

 INSERT INTO customers_100 
VALUES
(101 , 'aaa' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' , 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/'),
(103 , 'bbbbb' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' , 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/'),
(104 , 'ccccc' , 'Hariom' , 'KIRAR' , 'SST' , 'VIDISHA' , 'bharat' ,  '+913432432' , '+91349320' , 'HK123@gmail.com' , '25-01-2023' , 'www.hk.com/'),
(105 , 'ddddd' , 'MOHIT' , 'KIRAR' , 'SST' , 'Sanchi' , 'bharat' ,  '+913412345' , '+9134343212321' , 'mk123@gmail.com' , '15-02-2023' , 'www.mk.com/') ;
