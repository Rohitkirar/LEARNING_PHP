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
 
 -- insert multiple row from single query

 INSERT INTO customers_100 
VALUES
(101 , 'aaa' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' , 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/'),
(103 , 'bbbbb' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' , 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/'),
(104 , 'ccccc' , 'Hariom' , 'KIRAR' , 'SST' , 'VIDISHA' , 'bharat' ,  '+913432432' , '+91349320' , 'HK123@gmail.com' , '25-01-2023' , 'www.hk.com/'),
(105 , 'ddddd' , 'MOHIT' , 'KIRAR' , 'SST' , 'Sanchi' , 'bharat' ,  '+913412345' , '+9134343212321' , 'mk123@gmail.com' , '15-02-2023' , 'www.mk.com/') ;


SELECT * FROM customers_100 WHERE S_NO > 100;
