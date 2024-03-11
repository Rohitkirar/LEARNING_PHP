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
    password VARCHAR(20) NOT NULL,
    role ENUM('user'  , 'admin') NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL
);

DROP TABLE likes, images , comments , category ,users , story ;

DROP TABLE users;

SELECT * FROM users;
iNSERT iNTO users( username, password )
values('rohit12345' , 123453);