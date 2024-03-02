/*

    ON DELETE CASCADE

    MySQL provides a more effective way called ON DELETE CASCADE 
    referential action for a foreign key that allows you to delete 
    data from child tables automatically when you delete the data 
    from the parent table.

    ON DELETE CASCADE  referential action for a foreign key to delete data 
    automatically from the child tables when you delete data from the parent table.

*/

-- The relationship between the buildings and rooms tables 
-- is one-to-many (1:N) 

DROP TABLE IF EXISTS buildings , rooms;

CREATE TABLE IF NOT EXISTS buildings(
    building_no INT PRIMARY KEY AUTO_INCREMENT,
    building_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS rooms(
    room_no INT PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(255) NOT NULL,
    building_no INT NOT NULL,
    FOREIGN KEY (building_no)
    REFERENCES buildings(building_no)
    ON DELETE CASCADE
);

INSERT INTO buildings
    (building_name,address)
VALUES
    ('ACME Headquaters','3950 North 1st Street CA 95134'),
    ('ACME Sales','5000 North 1st Street CA 95134');

INSERT INTO rooms
    (room_name,building_no)
VALUES 
    ('Amazon',1),
    ('War Room',1),
    ('Office of CEO',1),
    ('Marketing',2),
    ('Showroom',2);

SELECT * FROM buildings;
SELECT * FROM rooms;

-- Notice that ON DELETE CASCADE  works only with tables with the storage engines that support foreign keys e.g., InnoDB


DELETE FROM buildings
WHERE building_no = 1;

-- it automatically delete rows from child table where on delete cascade property stores2

-- to know the reference table from a table use query

USE information_schema;

SELECT 
    TABLE_NAME
FROM
    referential_constraints
WHERE
    constraint_schema = 'classicmodels' AND
    referenced_table_name = 'buildings' AND
    delete_rule = 'CASCADE';