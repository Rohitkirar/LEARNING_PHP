
CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50) NOT NULL,
    Image_type VARCHAR(50) NOT NULL
);

INSERT INTO category
    (Title , Image_type)
VALUES
    ('REALISTIC FICTION' , 'jpg'),
    ('HISTORICAL FICTION' , 'jpg'),
    ('SCIENCE FICTION' , 'jpg'),
    ('MYSTERY' , 'jpg'),
    ('FANTASY' , 'jpg'),
    ('BIOGRAPHY' , 'jpg'),
    ('TRADITIONAL LITERATURE' , 'jpg'),
    ('BIOGRAPHY' , 'jpg'),
    ('INFORMATIONAL' , 'jpg'),
    ('poetry' , 'jpg')
    ;



SELECT * FROM category;

DROP TABLE story;
DROP TABLE category;