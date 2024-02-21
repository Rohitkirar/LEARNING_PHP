
use classicmodels;

CREATE TABLE IF NOT EXISTS customers_100 (
				S_No INT(6) , 
				customer_Id varchar(20) primary key , 
                First_name varchar(30) , 
                Last_Name varchar(30) , 
                Company varchar(100) , 
                city varchar(20) , 
                country varchar(20) , 
                phone_1 varchar(20) , 
                phone_2 varchar(20) , 
                Email varchar(20) , 
                Subscription_date varchar(10) , 
                Website varchar(100)
                ) ;
                
CREATE TABLE customers_100 (
				S_No INT(6) , 
				customer_Id varchar(20) primary key , 
                First_name varchar(30) , 
                Last_Name varchar(30) , 
                Company varchar(100) , 
                city varchar(20) , 
                country varchar(20) , 
                phone_1 varchar(20) , 
                phone_2 varchar(20) , 
                Email varchar(20) , 
                Subscription_date varchar(10) , 
                Website varchar(100)
                ) ;
                                
SELECT * FROM customers_100;

SELECT * FROM customers_100 ORDER BY S_No;

TRUNCATE TABLE customers_100;               -- NOTE : delete all the data from the table but not table

DROP TABLE customers_100;                   -- NOTE : DELETE the table along with data from database;

CREATE TABLE IF NOT EXISTS customers_1001;  			-- Generate Error : A table must have atleast one column to create
