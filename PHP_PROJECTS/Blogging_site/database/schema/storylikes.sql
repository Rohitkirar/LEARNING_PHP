-- Active: 1709188058198@@127.0.0.1@3306@blogging_site

CREATE TABLE likes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    story_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL,
    CONSTRAINT fk_likesposts
    FOREIGN KEY (story_id) 
    REFERENCES story(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_likesusers
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

SELECT * FROM storylikes;

RENAME TABLE likes to storylikes;