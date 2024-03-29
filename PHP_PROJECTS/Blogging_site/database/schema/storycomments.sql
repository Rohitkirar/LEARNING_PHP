SHOW DATABASES;
use adminusertest;

show tables;
CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    story_id INT NOT NULL,
    user_id INT NOT NULL,
    content VARCHAR(1000) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL,
    CONSTRAINT fk_commentstory
    FOREIGN KEY (story_id) 
    REFERENCES story(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_commentsusers
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

RENAME TABLE comments TO storyComments;

SELECT * FROM storycomments;

SELECT * FROM likes;

SELECT * FROM story;


TRUNCATE TABLE users ;
TRUNCATE TABLE  story ;
TRUNCATE TABLE  category ;
TRUNCATE TABLE comments ;
TRUNCATE TABLE  likes ;
TRUNCATE TABLE  images ;
