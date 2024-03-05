-- Active: 1709188058198@@127.0.0.1@3306@social_media
USE Social_media;

CREATE DATABASE IF NOT EXISTS Social_Media;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS postImages;

DROP TABLE IF EXISTS postComments;
DROP TABLE IF EXISTS postlikes;
DROP TABLE IF EXISTS tracking;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName varchar(100) GENERATED ALWAYS AS (CONCAT(firstName , ' ' , lastName)),
    email varchar(50) NOT NULL UNIQUE,
    mobile varchar(20) NOT NULL UNIQUE,
    gender ENUM('male' , 'female' , 'other') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW()
) ;

SELECT * FROM users;

CREATE TABLE IF NOT EXISTS posts (
    id INT primary KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title varchar(255) NOT NULL ,
    description TEXT ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW(),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE 
);

CREATE TABLE IF NOT EXISTS postComments(
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW(),
    CONSTRAINT fk_postcomment
    FOREIGN KEY (post_id)
    REFERENCES posts(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    Constraint fk_usercomment
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS postImages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    image BLOB NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW(),
    CONSTRAINT fk_postimage
    FOREIGN KEY (post_id)
    REFERENCES posts(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS postLikes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    flag BOOLEAN NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW(),
    Constraint fk_postlike
    FOREIGN KEY (post_id)
    REFERENCES posts(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    Constraint fk_userlike
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tracking(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    from_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    to_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE NOW()
);


SELECT * FROM users ;

INSERT INTO users
    (firstName , lastName , email , mobile , gender , created_at , updated_at)
VALUES  
    ('ROhit' , 'kirar' , 'rohitkirar123@gmail.com' , '99292292929' , 'male' , '2020-10-01' , '2022-10-01'),
    ('Soham' , 'Bharti' , 'soham123@gmail.com' , '2332292929' , 'male' , '2021-01-11' , DEFAULT),
    ('Akash' , 'patel' , 'akash123@gmail.com' , '43332292929' , 'male' , '2020-11-25' , '2023-11-25'),
    ('hritik' , 'yemde' , 'hritik123@gmail.com' , '13332292929' , 'male' , '2022-01-25' , DEFAULT),
    ('Sagar' , 'jethwa' , 'sagar123@gmail.com' , '12432292929' , 'male' , '2023-01-25' , DEFAULT),
    ('anant' , 'garg' , 'anant123@gmail.com' , '124322952359' , 'male' , '2024-01-25' , DEFAULT),
    ('jayendra' , 'rajput' , 'jayendra123@gmail.com' , '224322952359' , 'male' , '2021-01-25' , DEFAULT),
    ('jaydip' , 'singh' , 'jaydeep123@gmail.com' , '114322952359' , 'male' , '2023-08-21' , '2024-01-21'),
    ('bhavesh' , 'singh' , 'bhaves123@gmail.com' , '4322952359' , 'male' , '2021-03-11' , '2022-01-21')
;


SELECT * FROM posts;

INSERT INTO posts
    (user_id , title , description , created_at , updated_at)
VALUES
    (1 , 'feed' , 'Iscon Ahemdabaad' , '2024-02-23' , '2024-02-28' ),
    (1 , 'story' , 'BHOPAL TO AHemdabaad' , '2024-01-12' , '2024-01-13' ),
    (2 , 'feed' , 'Mount ABu' , '2023-12-01' , '2024-01-01' ),
    (3 , 'story' , 'Way to jaipur' , '2024-02-20' , Default);

SELECT * FROM tracking;
INSERT INTO tracking 
    (user_id , from_time , to_time)
VALUES
    (1 , '2024-03-04 12:00:00', DEFAULT),
    (3, '2023-01-08 11:00:00', '2024-03-04 01:50:50'),
    (2 , '2024-03-04 15:00:00', DEFAULT),
    (4 , '2024-03-04 18:00:00', DEFAULT),
    (5, '2024-03-04 03:00:00', '2024-03-04 14:50:50'),
    (2 , '2024-03-04 16:00:00', DEFAULT);

INSERT INTO tracking 
    (user_id , from_time , to_time)
VALUES
    (1 , '2022-08-04 09:00:00','2022-08-04 11:57:00'),
    (3, '2023-01-08 11:00:00', '2023-01-08 13:20:00'),
    (2 , '2022-11-24 04:00:00', '2022-11-24 4:57:00'),
    (4 , '2023-07-13 06:00:00','2023-07-13 09:57:27'),
    (5, '2022-08-16 03:00:00', '2022-08-16 06:50:20'),
    (2 , '2023-11-24 16:00:00', '2023-11-24 23:40:50');

SELECT * FROM postLikes;

INSERT INTO postlikes
    (post_id ,user_id, flag , created_at , updated_at)
VALUES
    (1 ,  2 , true ,'2024-03-04 11:50:00' ,'2024-03-04 11:50:00'  ),
    (2 ,  3 , true ,'2024-03-04 12:50:00' ,DEFAULT  ),
    (1 , 4 ,  true , '2024-03-04 11:50:00' ,'2024-03-04 11:50:00'  ),
    (2 ,  4 , true , '2024-03-04 12:50:00' ,DEFAULT  );

SELECT * FROM postComments;

INSERT INTO postcomments
    (post_id ,user_id, comment , created_at , updated_at)
VALUES
    (1 ,4 , 'happy journey' , '2024-01-12 23:11:23' , '2024-01-12 23:11:23' ),
    (2 , 4,'Beautiful Journey' , '2024-02-22 13:11:23' , Default );

SELECT * FROM postimages;

INSERT INTO postimages
    (post_id , image , created_at , updated_at)
VALUES 
    (1 , LOAD_FILE('C://Users//NK HP//Pictures//Camera Roll//ad.jpg') , '2024-02-23' , '2024-02-28');


SELECT * FROM users;

