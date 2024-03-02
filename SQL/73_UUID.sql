/*
UUID stands for Universally Unique IDentifier. 
UUID is defined based on RFC 4122, “a Universally Unique Identifier (UUID) URN Namespace

UUID is designed as a number that is unique globally in space and time. 
Two UUID values are expected to be distinct, even if they are generated on two independent servers.

To generate a UUID value, you use the UUID() function as follows:

UUID()

In MySQL, you can store UUID values in a compact format (BINARY) and display them in human-readable format (VARCHAR) with the help of the following functions:

UUID_TO_BIN
BIN_TO_UUID
IS_UUID

Notice that UUID_TO_BIN(), BIN_TO_UUID(), and IS_UUID() functions are only 
available in MySQL 8.0 or later.


*/

SELECT UUID();

DROP TABLE IF EXISTS customers_UUID;

CREATE TABLE customers_UUID (
    id BINARY(16) PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO customers_UUID
    (id, name)
VALUES
    (UUID_TO_BIN(UUID()),'John Doe'),
    (UUID_TO_BIN(UUID()),'Will Smith'),
    (UUID_TO_BIN(UUID()),'Mary Jane');

SELECT UUID_TO_BIN(UUID());