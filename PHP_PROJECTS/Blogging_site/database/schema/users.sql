-- Active: 1709188058198@@127.0.0.1@3306@blogging_site
CREATE DATABASE Blogging_Site;
DROP DATABASE Blogging_Site;
use Blogging_Site;
 
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male' , 'female' , 'other') NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    mobile VARCHAR(10) UNIQUE NOT NULL,
    username Varchar(20) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    role ENUM('user'  , 'admin') NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL
);

DROP TABLE likes, images , comments , category ,users , story ;

DROP TABLE users;


SELECT * FROM users;
iNSERT iNTO users(first_name , last_name , age , gender , email , mobile , username , password , role)
values("Rohit" , "Kirar" , 22 , "male" , "rohitkirar123@gmail.com" , "9988776655" , "rohitkirar123" , "12345678" , 'admin' );

SELECT role FROM users WHERE username = 'rohitkirar123' AND password = 'fe777d46a13efd25cff9';

SELECT Title , content , image FROM story JOIN images ON story.id = images.story_id WHERE story.id = 27;

SELECT * FROM category;