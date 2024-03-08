/*
 defining a trigger that will activate before or after an existing trigger 
 in response to the same event and action time:

SYNTAX 

    CREATE TRIGGER trigger_name
    {BEFORE|AFTER}{INSERT|UPDATE|DELETE} 
    ON table_name FOR EACH ROW 
    {FOLLOWS|PRECEDES} existing_trigger_name
    BEGIN
        -- statements
    END$$

The FOLLOWS  allows the new trigger to activate after an existing trigger.
The PRECEDES  allows the new trigger to activate before an existing trigger.


*/

-- suppose we have products table 
-- i)you want to change the pricet (column MSRP ) and log the old price in a separatetable PriceLogs
-- ii) you also want to store user information who change price in separate table userChangelogs

SELECt productCode , MSRP  FROM products;

CREATE TABLE PRICELOGS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    productCode VARchar(15) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
        ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (productCode)
    REFERENCES products(productCode)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

DROP TABLE IF EXISTS USERCHANGELOGS;

CREATE TABLE USERCHANGELOGS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    productCode VARchar(15) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
        ON UPDATE CURRENT_TIMESTAMP,
    updated_by VARCHAR(50) NOT NULL,
    FOREIGN KEY (productCode)
    REFERENCES products(productCode)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TRIGGER before_products_update
    BEFORE UPDATE ON products
    FOR EACH ROW
BEGIN
    IF OLD.msrp <> NEW.msrp THEN
        INSERT INTO PRICELOGS(productcode , price)
        VALUES(old.productCode , old.msrp);
    END IF ;
END;

DROP TRIGGER before_products_update_log_user;

CREATE TRIGGER before_products_update_log_user
    BEFORE UPDATE ON products
    FOR EACH ROW
    FOLLOWS before_products_update
BEGIN
    IF old.msrp <> new.msrp THEN
        INSERT INTO USERCHANGELOGS(productCode, price , updated_By)
        VALUES(old.productCode, new.msrp , USER());
    END IF;
END;

SELECt productCode , MSRP  FROM products
WHERE 
    productCode = 'S12_1099';

UPDATE products SET msrp = 200 WHERE productCode = 'S12_1099';
UPDATE products SET msrp = 300 WHERE productCode = 'S12_1099';

SELECT * FROM USERCHANGELOGS;

SELECT * FROM priceLogs;


SHOW TRIGGERS ;
SHOW TRIGGERS FROM classicmodels;
SHOW TRIGGERS FROM classicmodels WHERE `table` = 'products';