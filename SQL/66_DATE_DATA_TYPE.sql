/*
    DATE is one of the five temporal data types used for managing date values. 
    MySQL uses yyyy-mm-dd format for storing a date value. This format is fixed and it is not possible to change it.

    DATE_FORMAT function to format the date the way you want.

    MySQL uses three bytes to store a DATE value. 
    The DATE values range from 1000-01-01 to 9999-12-31.

    Date values with two-digit years
    Year values in the range 00-69 are converted to 2000-2069.
    Year values in the range 70-99 are converted to 1970 – 1999.


*/

USE classicmodels;

DROP TABLE IF EXISTS people;

CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    dob DATE NOT NULL
);


INSERT INTO people
    (firstName , lastName , dob)
VALUES
    ('JOHN' , 'DOE' , '1990-09-01');


SELECT * FROM people;

INSERT INTO people
    (firstName , lastName , dob)
VALUES  
    ('Jack' , 'Daniel' , '01-09-01'),
    ('Lily' , 'Bush' , '80-08-02');

SELECT NOW();

SELECT DATE(NOW());

SELECT CURDATE();

SELECT DATE_FORMAT(CURDATE() , '%d/%m/%Y');

SELECT DATEDIFF(CURDATE() , '2023-03-02');

SELECT 
    '2015-01-01' start,
    DATE_ADD('2015-01-01', INTERVAL 1 DAY) 'one day later',
    DATE_ADD('2015-01-01', INTERVAL 1 WEEK) 'one week later',
    DATE_ADD('2015-01-01', INTERVAL 1 MONTH) 'one month later',
    DATE_ADD('2015-01-01', INTERVAL 1 YEAR) 'one year later';

SELECT 
    '2015-01-01' start,
    DATE_SUB('2015-01-01', INTERVAL 1 DAY) 'one day before',
    DATE_SUB('2015-01-01', INTERVAL 1 WEEK) 'one week before',
    DATE_SUB('2015-01-01', INTERVAL 1 MONTH) 'one month before',
    DATE_SUB('2015-01-01', INTERVAL 1 YEAR) 'one year before';


SELECT DAY(CURDATE()) day, 
    MONTH(CURRENT_DATE) month, 
    QUARTER(CURRENT_TIMESTAMP) quarter, 
    YEAR(NOW()) year,
    WEEKDAY(CURRENT_DATE()) weekday,
    WEEK(NOW()) week,
    WEEKOFYEAR(CURDATE()) weekofyear;


