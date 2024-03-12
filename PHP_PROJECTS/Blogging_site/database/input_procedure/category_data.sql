
DELIMITER //
CREATE PROCEDURE category_data(
    IN inp_title Varchar(50),
    IN inp_image_name VARCHAR(50)
)
BEGIN
    INSERT INTO category
        (title , image_name)
    VALUES
        (inp_title , inp_image_name);
END;