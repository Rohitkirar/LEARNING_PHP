/*
    -> To insert multiple rows into a table, you use the following form of the INSERT statement:
        
        INSERT INTO table_name (column_list) 
        VALUES 
        (value_list_1), 
        (value_list_2),
        ... 
        (value_list_n);

     -> In theory, you can insert any number of rows using a single INSERT statement.
    However, when the MySQL server receives an INSERT statement whose size is bigger than the value specified by the max_allowed_packet option, it issues a packet too large error and terminates the connection.
    This statement shows the current value of the max_allowed_packet variable:
    SHOW VARIABLES LIKE 'max_allowed_packet';

    | max_allowed_packet | 67108864 |

*/
use classicmodels;

show tables;

CREATE TABLE projects(
    project_id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(project_id)
);

INSERT INTO projects
    (name , start_date , end_date)
VALUES 
    ('AI FOR marketing' , '2019-08-01' , '2019-12-31'),
    ('ML FOR Sales' , '2019-05-15' , '2019-11-20');

INSERT INTO projects
    (name , start_date , end_date)
VALUES 
    ('marketing site' , '2009-01-01' , '2019-12-31'),
    ('Sales site' , '2003-07-10' , '2014-11-01');


INSERT INTO projects
    (name , start_date , end_date)
VALUES
    ('NeuroSynthIQ' , '2023-12-01' , '2024-12-31'),
    ('QuantumMind Explorer' , '2023-05-15' , '2024-12-20' ),
    ('SentientBot Assistant' , '2023-05-15' , '2024-10-20');


INSERT INTO projects
    (name , start_date , end_date)
VALUES
    ('NeuroSynthIQ' , '2023-12-01' , '2024-12-31'),
    ('ZuantumMind oxplorer' , '2023-05-15' , '2024-12-20' ),
    ('PeuroSynthIQ' , CURRENT_DATE , null),
    ('UantumMind Ispxplorer' , '2023-05-15' , '2024-12-20' ),
    ('EuroSynthIQ' , '2023-12-01' , '2024-12-31'),
    ('QuantumMind Explorer' , '2023-12-15' , '2024-12-40' ),
    ('SentientBot Assistant' , '2023-15-15' , '2024-10-20');


SELECT * FROM projects;

SELECT LAST_INSERT_ID();

-- output 3 NOTE The output shows that the LAST_INSERT_ID() returns the id of the first row in the three rows, not the id of the last row.