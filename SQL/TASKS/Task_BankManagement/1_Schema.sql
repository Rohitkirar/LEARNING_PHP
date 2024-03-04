-- Active: 1709188058198@@127.0.0.1@3306@accountmanagement

CREATE DATABASE IF NOT EXISTS AccountManagement;

USE AccountManagement;

DROP TABLE IF EXISTS USERS ;
DROP TABLE IF EXISTS ACCOUNTS;
DROP TABLE IF EXISTS TRANSACTIONS;

CREATE TABLE IF NOT EXISTS Users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    fullName varchar(120) GENERATED ALWAYS AS (CONCAT(firstName , ' ' , lastName)),
    email varchar(50) NOT NULL DEFAULT 'abc123@gmail.com',
    mobile varchar(15) NOT NULL UNIQUE,
    gender ENUM('male' , 'female' , 'other') DEFAULT 'male'
);

CREATE TABLE IF NOT EXISTS ACCOUNTS(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    Number Varchar(20) NOT NULL UNIQUE,
    IFSC VARCHAR(20) NOT NULL ,
    created_at DATETIME DEFAULT NOW(),
    updated_at DATETIME DEFAULT NOW()
    ON UPDATE NOW(),
    CONSTRAINT uc_branch
    UNIQUE(user_id , IFSC),
    CONSTRAINT fk_users
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Transactions(
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    Amount INT NOT NULL ,
    Type ENUM('credit' , 'debit') NOT NULL,
    status ENUM('pending' , 'successfull') NOT NULL,
    created_at DATETIME DEFAULT NOW(),
    updated_at DATETIME DEFAULT NOW()
    ON UPDATE NOW(),
    CONSTRAINT fk_accounts
    FOREIGN KEY (account_id)
    REFERENCES accounts(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);


INSERT INTO USERS 
    (firstName , lastName , email , mobile , gender)
VALUES
    ('Rohit' , 'Kirar' , 'rohitkirar12@gmail.com' , '9988776655' ,'male'),
    ('Sagar' , 'Jethwa' , 'sagarjethwa321@gmail.com' , '6655443322', 'male'),
    ('Soham' , 'Bharti' , 'sohambharti123@gmail.com' , '7766554433' ,'male'),
    ('Akash' , 'Patel' , 'akashpatel123@gmail.com' , '8877990066' ,'male');

INSERT INTO USERS 
    (firstName , lastName , email , mobile , gender)
VALUES
    ('Hritik' , 'yemde' , 'hritikyemde12@gmail.com' , '9088476622' ,'male'),
    ('karan' , 'bhanusali' , 'karanbhansuli321@gmail.com' , '8855443322', 'male'),
    ('jayendra' , 'rajput' , 'jayendra123@gmail.com' , '1334324433' ,'male'),
    ('shivaprasad' , 'sharma' , 'shivprasad123@gmail.com' , '843990066' ,'male');

SELECT * FROM USERS;

INSERT INTO ACCOUNTS 
    (user_id , Number , IFSC )
VALUES 
    (1 , '12345678' , 'SBIN0012321'),
    (3 , '45678901' , 'SBIN0012211'),
    (4 , '20112012' , 'SBIN0012321'),
    (1 , '12345677' , 'SBIN0012211'),
    (2 , '55443322' , 'SBIN0012321');


SELECT fullName , email , mobile , gender , Number , IFSC , created_at , updated_at
FROM USERS , Accounts
WHERE users.id = accounts.user_id;

SELECT * FROM accounts;

INSERT INTO transactions
    (account_id , amount , type , status )
VALUES 
    (1 , 200000 , 'credit' , 'successfull' ),
    (2 , 35000 , 'credit' , 'successfull' ),
    (3 , 25000 , 'credit' , 'successfull' ),
    (1 , 50000 , 'debit' , 'successfull' ),
    (2 , 65000 , 'credit' , 'successfull' ),
    (3 , 1500 , 'debit' , 'successfull' ),
    (1 , 500 , 'debit' , 'successfull' ),
    (2 , 35000 , 'credit' , 'successfull' ),
    (3 , 25000 , 'credit' , 'successfull' ),
    (1 , 150000 , 'credit' , 'successfull' ),
    (4 , 3000 , 'credit' , 'successfull' ),
    (3 , 1500 , 'debit' , 'successfull' ),
    (1 , 15900 , 'debit' , 'successfull' );

INSERT INTO transactions
    (account_id , amount , type , status , created_at)
VALUES 
    (1 , 200000 , 'credit' , 'pending' , '2023-10-11'),
    (2 , 35000 , 'credit' , 'successfull' , '2023-12-10'),
    (3 , 25000 , 'debit' , 'successfull' , '2024-01-25'),
    (1 , 50000 , 'debit' , 'pending' , '2023-11-21'),
    (2 , 65000 , 'credit' , 'successfull' , '2023-03-23'),
    (3 , 1500 , 'debit' , 'successfull' , '2024-02-08'),
    (1 , 500 , 'debit' , 'successfull' , STR_TO_DATE('2023-05-24' , '%Y-%m-%d')),
    (2 , 35000 , 'credit' , 'pending', '2023-04-13' ),
    (3 , 25000 , 'credit' , 'successfull' , '2022-10-11'),
    (1 , 150000 , 'credit' , 'successfull' , '2022-11-11'),
    (4 , 3000 , 'credit' , 'successfull' , '2023-10-11'),
    (3 , 1500 , 'debit' , 'successfull' , '2023-04-30'),
    (1 , 15900 , 'credit' , 'successfull' , '2023-05-31'),
    (2 , 200000 , 'credit' , 'pending' , '2023-10-11'),
    (5 , 35000 , 'credit' , 'pending' , '2023-12-10'),
    (4 , 25000 , 'debit' , 'successfull' , '2024-01-25'),
    (3 , 50000 , 'debit' , 'successfull' , '2023-11-21'),
    (5 , 65000 , 'credit' , 'pending' , '2023-03-23'),
    (2 , 1500 , 'debit' , 'successfull' , '2024-02-08'),
    (4 , 500 , 'debit' , 'successfull' , STR_TO_DATE('2023-05-24' , '%Y-%m-%d')),
    (4 , 35000 , 'credit' , 'successfull', '2023-04-13' ),
    (2 , 25000 , 'credit' , 'pending' , '2022-10-11'),
    (5 , 150000 , 'credit' , 'successfull' , '2022-11-11'),
    (1 , 3000 , 'credit' , 'successfull' , '2023-10-11'),
    (4 , 1500 , 'debit' , 'pending' , '2023-04-30'),
    (5 , 15900 , 'credit' , 'successfull' , '2023-05-31');
    
INSERT INTO transactions
    (account_id , amount , type , status , created_at)
VALUES 
    (1 , 200000 , 'debit' , 'pending' , '2023-10-17'),
    (2 , 35000 , 'debit' , 'successfull' , '2023-12-17'),
    (3 , 25000 , 'credit' , 'successfull' , '2024-02-02'),
    (1 , 50000 , 'credit' , 'pending' , '2023-11-28'),
    (2 , 65000 , 'debit' , 'successfull' , '2023-03-30'),
    (3 , 1500 , 'credit' , 'successfull' , '2024-02-15'),
    (1 , 500 , 'credit' , 'successfull' , STR_TO_DATE('2023-05-18' , '%Y-%m-%d')),
    (2 , 35000 , 'debit' , 'pending', '2023-04-20' ),
    (3 , 25000 , 'debit' , 'successfull' , '2022-10-17'),
    (1 , 150000 , 'debit' , 'successfull' , '2022-11-18'),
    (4 , 3000 , 'debit' , 'successfull' , '2023-10-18'),
    (3 , 1500 , 'credit' , 'pending' , '2023-04-23'),
    (1 , 15900 , 'debit' , 'successfull' , '2023-05-24'),
    (2 , 200000 , 'debit' , 'pending' , '2023-10-17'),
    (5 , 35000 , 'debit' , 'pending' , '2023-12-17'),
    (4 , 25000 , 'credit' , 'successfull' , '2024-01-02'),
    (3 , 50000 , 'credit' , 'successfull' , '2023-11-28'),
    (5 , 65000 , 'debit' , 'pending' , '2023-03-16'),
    (2 , 1500 , 'credit' , 'successfull' , '2024-02-16'),
    (4 , 500 , 'credit' , 'successfull' , STR_TO_DATE('2023-05-17' , '%Y-%m-%d')),
    (4 , 35000 , 'debit' , 'successfull', '2023-04-19' ),
    (2 , 25000 , 'credit' , 'pending' , '2022-10-03'),
    (5 , 150000 , 'credit' , 'successfull' , '2022-11-12'),
    (1 , 3000 , 'credit' , 'successfull' , '2023-10-04'),
    (4 , 1500 , 'credit' , 'pending' , '2023-04-10'),
    (5 , 15900 , 'debit' , 'successfull' , '2023-05-11');

SELECT * FROM transactions;


SELECT account_id , count(id) as totaltransaction , MONTH(created_at) as Months ,  YEAR(created_at) as Years 
FROM transactions 
GROUP BY status , years , months , account_id
ORDER BY years , months , status;


SELECT WEEK(NOW()) , MONTH(NOW()) , YEAR(NOW());


/*

    COALESCE(
            (SELECT sum(amount) From transactions 
            where 
                type = 'credit' AND 
                accounts.id = account_id 
            ) , 0 ) as totalcreditAmount,
    COALESCE(
            (SELECT sum(amount) FROM transactions 
            WHERE 
                type = 'debit' AND 
                accounts.id = account_id 
            )  , 0 ) as totaldebitAmount,
*/

use classicmodels;

SELECT * FROM customers;

use accountManagement;

ALTER TABLE users 
DROP column email;
SELECT * FROM users;
select * FROM customers;
