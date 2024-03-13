
CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50) NOT NULL,
    Image_type VARCHAR(50) NOT NULL
);

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



SELECT * FROM category;

DROP TABLE story;
DROP TABLE category;