/* NOT WORKING 
The invisible indexes allow you to mark indexes as unavailable
for the query optimizer

NOTE IMP : 
The index on the primary key column cannot be invisible. 
If you try to do so, MySQL will issue an error.

*/;

-- To create an invisible index, you the following statement:
CREATE INDEX index_name
ON table_name( c1, c2, ...) INVISIBLE;

-- To change the visibility of existing indexes, you use the following statement:
ALTER TABLE table_name
ALTER INDEX index_name [VISIBLE | INVISIBLE];

-- EXAMPLE 

SELECT * FROM customers;

DROP INDEX postalCode_index ON customers;

CREATE INDEX postalCode_index
ON customers(postalCode) INVISIBLE;


SHOW INDEXES FROM customers;


ALTER TABLE customers
ALTER INDEX city_country INVISIBLE;

ALTER TABLE customers
ALTER INDEX salesRepIndex INVISIBLE ;

CREATE TABLE discounts (
    discount_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    valid_from DATE NOT NULL,
    valid_to DATE NOT NULL,
    amount DEC(5 , 2 ) NOT NULL DEFAULT 0,
    UNIQUE discount_id(discount_id)
);



    ALTER TABLE discounts
    ALTER INDEX discount_id INVISIBLE;