/*
    A lock is a flag associated with a table. 
    MySQL allows a client session to explicitly acquire a table lock
    to prevent other sessions from accessing the same table during a specific period.

    A client session can acquire or release table locks only for itself.

    A client session cannot acquire or release table locks for other client sessions.

    LOCK TABLES statement syntax :

        LOCK TABLES table_name [READ | WRITE]
    
    UNLOCK TABLES statement Syntax:

        UNLOCK TABLES;

    READ :
    A READ lock for a table can be acquired by multiple sessions at the
    same time. In addition, other sessions can read data from the table 
    without acquiring the lock. 

    The session that holds the READ lock can only read data from the table, but cannot write. 
    And other sessions cannot write data to the table until the READ lock is released. 

    The write operations from another session will be put into the waiting states until the READ lock is released.

    Write Locks

A WRITE lock has the following features:

The only session that holds the lock of a table can read and write 
data from the table.

Other sessions cannot read data from and write data to the table 
until the WRITE lock is released.


*/

USE classicmodels;

DROP TABLE IF EXISTS messages;

CREATE TABLE messages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(100) NOT NULL
);

-- LOCK TABLES table_name [READ | WRITE]

INSERT INTO messages
VALUES
    ('','GOOD MORNING'),
    ('' ,'GOOD AFTERNOON');

SELECT * FROM messages;

-- LOCK TABLES table_name READ ;

LOCK TABLES messages READ;

SELECT * FROM messages; -- read data easily

INSERT INTO messages
VALUES ('' , 'GOOD AFTERNOON'); -- ERROR Table 'messages' was locked with a READ lock and can't be updated

-- read  can be possible from other session in read lock while
-- write operations goes into a waiting state until lock release;

UNLOCK TABLES;

INSERT INTO messages
VALUES ('' , 'GOOD AFTERNOON'); -- works fine now after unlocking


-- LOCK TABLES table_name WRITE;

LOCK TABLES messages WRITE;

SELECT * FROM messages; -- read successfully in same session only

INSERT INTO messages 
VALUES 
    ('' , 'GOOD EVENING'); -- write successfull in same session only


-- cannot read and write from another session if lock tables write active
-- the operations goes into a waiting state until lock release;

UNLOCK TABLES;


/*
Read locks are “shared” locks that prevent a 
    write lock is being acquired but not other read locks.
Write locks are “exclusive ” locks that prevent any other lock 
    of any kind.
*/


