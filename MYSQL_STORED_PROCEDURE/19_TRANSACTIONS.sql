-- Active: 1709188058198@@127.0.0.1@3306@accountmanagement
/*
* In the database world, a transaction is a sequence of one or more SQL statements 
    that are executed as a single unit of work.

* Transactions allow you to ensure the integrity of data by enabling a set of 
    operations to be either

* MySQL supports transactions via the START TRANSACTION, COMMIT, and ROLLBACK statements:

 -> START TRANSACTION – Mark the beginning of a transaction. 
                        Note that the BEGIN or  BEGIN WORK are the aliases 
                        of the START TRANSACTION.
 -> COMMIT – Apply the changes of a transaction to the database.
 -> ROLLBACK – Undo the changes of a transaction by reverting the database to the state before the transaction starts.

* By default, when you execute an SQL statement, MySQL automatically wraps it in a 
transaction and commits the transaction automatically.

* To instruct MySQL to not start a transaction implicitly and commit the changes 
automatically, you set the value of the autocommit variable to 0 or OFF:

SET autocommit = OFF;   ||      SET autocommit = 0;

* To enable the auto-commit mode, you set the value of the autocommit variable to 1 or ON:

SET autocommit = 1;

* To enable the auto-commit mode, you set the value of the autocommit variable to 1 or ON:

SET autocommit = 1;     ||     SET autocommit = ON;



*/;

CREATE DATABASE banks;
USE banks;

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS accounts(
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    account_holder VARCHAR(255) NOT NULL,
    balance DECIMAL (10,2) NOT NULL
);

CREATE TABLE transactions(
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    transaction_type ENUM('Deposit' , 'withdrawal') NOT NULL,
    FOREIGN KEY (account_id)
    REFERENCES accounts(account_id)
)


SET autocommit = 0;

DELIMITER ;
START TRANSACTION;
INSERT INTO users
    (id , username )
VALUES 
    (101, 'rohitkirar');

UPDATE users 
SET email = 'rohitkirar123@gmail.com'
WHERE id = 101;

SELECT * FROM users; 
-- The output shows that the users table has a row but it is only visible to the 
--  current session, not other sessions.
-- If you open another session and query data from the users table, 
-- you will not see any rows in the users table.
-- The reason is that the transaction in the first session has not been committed.

ROLLBACK ;
commit ;


INSERT INTO accounts
    (account_holder , balance)
VALUES
    ('Rohit Kirar' , 1000),
    ('Roman Reign' , 500.00);

DROP PROCEDURE IF EXISTS transfer;
DELIMITER //
CREATE PROCEDURE transfer(
    IN sender_id INT,
    IN receiver_id INT,
    IN amount DECIMAL(10,2)
)
BEGIN
    DECLARE rollback_message VARCHAR(255) DEFAULT 'Transaction rolled back : Insufficient Funds';
    DECLARE commit_message VARCHAR(255) DEFAULT 'Transaction committed successfully';

    START TRANSACTION;

    UPDATE accounts SET balance = balance - amount WHERE account_id = sender_id;

    UPDATE accounts SET balance = balance + amount WHERE account_id = receiver_id;

    IF ((SELECT balance FROM accounts where account_id = sender_id) < 0) THEN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = rollback_message;
    ELSE
        INSERT INTO transactions(account_id , amount , transaction_type)
        VALUES(sender_id , -amount , 'withdrawal'),
                (receiver_id , amount , 'depoist');
        COMMIT;
        SELECT commit_message AS "RESULT";
    END IF;
END //

set autocommit = 0;

SELECT * FROM accounts;

call transfer(2 , 1 , 500);

/*
SUMMARY

A transaction is a sequence of SQL statements that is executed as a single unit of work.

Use the START TRANSACTION statement to start a transaction.

Use the COMMIT statement to apply the changes made during the transaction to the database.

Use the ROLLBACK statement to roll back the changes made during the transaction and revert 
the state of the database before the transaction starts.

*/







