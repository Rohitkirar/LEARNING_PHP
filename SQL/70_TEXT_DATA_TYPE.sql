/*
 -- Besides CHAR and VARCHAR character types, MySQL supports the TEXT type that provides more features.
  
  The TEXT is useful for storing long-form text strings that can take 
  from 1 byte to 4GB.

  TEXT data type for storing articles in news sites, and product descriptions in e-commerce sites.

  CHAR and VARCHAR type, you don’t have to specify a storage length when you use a TEXT type for a column

  MySQL does not remove or pad spaces when retrieving or inserting text data like CHAR and VARCHAR.

    TEXT data is not stored in the database server’s memory. 
    Therefore, when you query TEXT data, MySQL has to read from it from the disk, which is much slower in comparison with CHAR and VARCHAR.

    MySQL provides four TEXT types:

    TINYTEXT
    TEXT
    MEDIUMTEXT
    LONGTEXT

    TINYTEXT – 255 Bytes (255 characters)
    TEXT – 64KB (65,535 characters)
    MEDIUMTEXT – 16MB (16,777,215 characters)
    LONGTEXT – 4GB (4,294,967,295 characters)

-- Use the TEXT data type to store long texts in the database.
*/

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    summary TINYTEXT
);

ALTER TABLE articles 
ADD COLUMN body TEXT NOT NULL
AFTER summary;

CREATE TABLE whitepapers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    body MEDIUMTEXT NOT NULL,
    published_on DATE NOT NULL
); 