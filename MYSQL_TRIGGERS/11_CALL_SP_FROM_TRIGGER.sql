/*
MySQL allows you to call a stored procedure from a trigger by using the CALL statement. 
By doing this, you can reuse the same stored procedure in several triggers.

NOT : the trigger cannot call a stored procedure that has OUT or INOUT
*/

DELIMITER $$

CREATE TRIGGER before_accounts_update
BEFORE UPDATE
ON accounts FOR EACH ROW
BEGIN
    CALL CheckWithdrawal (
        OLD.accountId, 
        OLD.amount - NEW.amount
    );
END$$

DELIMITER ;



DELIMITER $$

CREATE PROCEDURE Withdraw(
    fromAccountId INT, 
    withdrawAmount DEC(10,2)
)
BEGIN
    IF withdrawAmount <= 0 THEN
        SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = 'The withdrawal amount must be greater than zero';
    END IF;
    
    UPDATE accounts 
    SET amount = amount - withdrawAmount
    WHERE accountId = fromAccountId;
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE CheckWithdrawal(
    fromAccountId INT,
    withdrawAmount DEC(10,2)
)
BEGIN
    DECLARE balance DEC(10,2);
    DECLARE withdrawableAmount DEC(10,2);
    DECLARE message VARCHAR(255);

    -- get current balance of the account
    SELECT amount 
    INTO balance
    FROM accounts
    WHERE accountId = fromAccountId;
    
    -- Set minimum balance
    SET withdrawableAmount = balance - 25;

    IF withdrawAmount > withdrawableAmount THEN
        SET message = CONCAT('Insufficient amount, the maximum withdrawable is ', withdrawableAmount);
        SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = message;
    END IF;
END$$

DELIMITER ;

