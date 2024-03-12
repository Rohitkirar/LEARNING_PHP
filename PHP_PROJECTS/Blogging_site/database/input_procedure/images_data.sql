CREATE PROCEDURE images_data(
    IN inp_story_id INT ,
    IN inp_image BLOB
)
BEGIN
    INSERT INTO images
        (story_id , image)
    VALUES
        (inp_story_id , inp_image);
END;