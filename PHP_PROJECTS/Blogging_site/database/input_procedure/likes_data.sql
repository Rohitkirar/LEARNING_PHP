
DELIMITER //
CREATE PROCEDURE likes_data(
    IN inp_story_id INT ,
    IN inp_user_id INT 
)
BEGIN 
    INSERT INTO likes
        (story_id , user_id)
    VALUES
        (inp_story_id , inp_user_id);
END;