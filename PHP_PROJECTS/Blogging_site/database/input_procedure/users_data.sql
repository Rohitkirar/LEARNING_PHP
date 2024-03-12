DROP PROCEDURE users_data;
DELIMITER //
CREATE PROCEDURE users_data(
    IN inp_first_name VARCHAR(50),
    IN inp_last_name VARCHAR(50),
    IN inp_age INT,
    IN inp_gender VARCHAR(10),
    IN inp_email  VARCHAR(50) ,
    IN inp_mobile VARCHAR(10),
    IN inp_username VARCHAR(20),
    IN inp_password VARCHAR(20),
    IN inp_role VARCHAR(10)
)
BEGIN
    INSERT INTO users
        (first_name , last_name , age , gender , email , mobile , username , password , role)
    VALUES
        (inp_first_name , inp_last_name , inp_age , inp_gender , inp_email , inp_mobile , inp_username , inp_password , inp_role);
END ; 


