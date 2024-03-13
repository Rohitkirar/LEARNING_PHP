
CREATE TABLE images(
    id INT AUTO_INCREMENT PRIMARY KEY,
    story_id INT NOT NULL,
    image varchar(1000),
    -- image BLOB NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENt_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL,
    CONSTRAINT fk_imagesstory
    FOREIGN KEY (story_id)
    REFERENCES story(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

SELECT * FROM images;
SELECT * FROM story;

ALTER TABLE images MODIFY image varchar(1000) ;

SELECT story.id as story_id , category.Title as category_title , story.title as story_title , content , image
            FROM category JOIN story 
            ON category.id = story.category_id 
            LEFT JOIN images
            ON story.id = images.story_id
            WHERE story.user_id = 1 AND story.deleted_at IS NULL ;

