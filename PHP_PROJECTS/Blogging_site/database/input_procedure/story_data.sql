DELIMITER //
CREATE PROCEDURE story_data(
    IN inp_user_id INT ,
    IN inp_category_id INT ,
    IN inp_content TEXT 
)
BEGIN
    INSERT INTO story
        (user_id , category_id , content)
    VALUES
        (inp_user_id , inp_category_id ,inp_content);
END;

