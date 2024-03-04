-- MySQL BLOB data type


USE classicmodels;

DROP TABLE IF EXISTS images;

CREATE TABLE images (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    image_data LONGBLOB NOT NULL
);

SELECT @@secure_file_priv;

/*
The secure_file_priv system variable restricts the locations on the MySQL 
server from which the LOAD_FILE() function can read files.

Third, insert a binary image into the image_data of the images table using 
the LOAD_FILE() function:
*/

INSERT INTO images
    (title , image_data)
VALUES
    ('MYsql tutorial' , LOAD_FILE('C:/xampp/htdocs/Backend_Training/SQL/70_TEXT_DATA_TYPE.sql'));


SELECT * FROM images;



-- Notice that you need to replace the backslash (\) with the forward-slash (/) in the path to the file on 
-- Windows to make it work properly.

INSERT INTO images
    (title , image_data)
VALUES
    ('sample database' , 'C:/Users/NK HP/Downloads');



SELECT image_data from images WHERE title = 'sample database';


-- se MySQL BLOB to store large binary data in the database.

/*
 -> a BLOB (Binary Large Object) is a data type that allows you to store large binary data,
    such as images, audio, video, and so on. BLOBs are useful when you want to store and retrieve data in your database.

 -> MySQL supports the following types of BLOBs:

    TINYBLOB: Maximum length of 255 bytes.
    BLOB: Maximum length of 65,535 bytes.
    MEDIUMBLOB: Maximum length of 16,777,215 bytes.
    LONGBLOB: Maximum length of 4,294,967,295 bytes.


If you attempt to load the file from other locations, the LOAD_FILE() function returns NULL.

*/


