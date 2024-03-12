DELIMITER //
CREATE PROCEDURE comments_data(
    IN inp_story_id INT ,
    IN inp_user_id INT,
    IN inp_content VARCHAR(1000)
)
BEGIN
    INSERT INTO comments
        (story_id , user_id , inp_content)
    VALUES
        (inp_story_id , inp_user_id , inp_content);
END;