-- Active: 1709188058198@@127.0.0.1@3306@blogging_site


CREATE TABLE story(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL ,
    category_id INT NOT NULL,
    Title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL ,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL,
    CONSTRAINT fk_storyuser
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_storycategory
    FOREIGN KEY (category_id)
    REFERENCES category(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);
UPDATE story SET deleted_at = CURRENT_TIMESTAMP WHERE id = 14;
UPDATE story SET deleted_at = null;

SELECT * FROM story;