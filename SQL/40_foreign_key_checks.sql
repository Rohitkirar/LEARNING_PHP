/*

    -> The line foreign_key_checks = 0 is typically used in MySQL to disable foreign key constraint checks temporarily. 
        When set to 0, it allows you to perform operations (such as inserts, updates, or deletes) without enforcing foreign key constraints. However, it’s essential to be cautious when using this setting, as it can lead to data integrity issues if not handled properly.
    
    -> it is very useful to disable foreign key checks. 
        For example, you can load data to the parent and child tables in any order with the foreign key constraint check disabled.
    -> If you don’t disable foreign key checks, you have to load data into the parent tables first and then the child tables in sequence, which can be tedious
    -> Another scenario in which you want to disable the foreign key check is when you want to drop a table. 
        Unless you disable the foreign key checks, you cannot drop a table referenced by a foreign key constraint.
    
    -> To disable foreign key checks, you set the foreign_key_checks variable to zero as follows:

        SET foreign_key_checks = 0;

    -> To enable the foreign key constraint check, you set the value of the foreign_key_checks to 1:

        SET foreign_key_checks = 1;

*/
use fkdemo;

CREATE TABLE countries(
    country_id INT AUTO_INCREMENT,
    country_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(country_id)
);

CREATE TABLE cities(
    city_id INT AUTO_INCREMENT ,
    city_name VARCHAR(255) NOT NULL,
    country_id INT NOT NULL,
    PRIMARY KEY (city_id),
    CONSTRAINT fk_country
    FOREIGN KEY (country_id)
    REFERENCES countries(country_id)
);


INSERT INTO cities(city_name , country_id)
VALUES ('New York' , 1);

-- Error Code: 1452. Cannot add or update a child

-- Disable foreign key check example

SET foreign_key_checks = 0 ;

INSERT INTO cities(city_name , country_id)
VALUES ('NEW YORK' , 1);

DROP TABLE countries;

SELECT * FROM cities;

-- ENABLE foreign key check example

SET foreign_key_checks = 1 ;

--  add row to counries ;

INSERT INTO countries(country_name)
VALUES('USA');

SELECT * FROM countries;

-- Use the SET foreign_key_checks = 0 to disable foreign key checks in MySQL.
