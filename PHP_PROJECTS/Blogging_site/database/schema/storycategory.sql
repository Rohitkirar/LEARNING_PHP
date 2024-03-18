
CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50) NOT NULL,
    Image_type VARCHAR(50) NOT NULL
);

ALTER TABLE category
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN deleted_at DATETIME DEFAULT NULL;

ALTER TABLE category CHANGE COLUMN image_type image VARCHAR(255) NOT NULL;

INSERT INTO category
    (Title , Image_type)
VALUES
    ('MOVIE STORY' , 'jpg'),
    ('HISTORICAL FICTION' , 'jpg'),
    ('SCIENCE FICTION' , 'jpg'),
    ('MYSTERY' , 'jpg'),
    ('HOLY' , 'jpg'),
    ('BIOGRAPHY' , 'jpg'),
    ('TRADITIONAL LITERATURE' , 'jpg'),
    ('CURRENT ISSUE' , 'jpg'),
    ('GOVERNMENT' , 'jpg'),
    ('POETRY' , 'jpg')
    ;

RENAME TABLE category to storyCategory;

SELECT * FROM storycategory;

DROP TABLE story;
DROP TABLE category;