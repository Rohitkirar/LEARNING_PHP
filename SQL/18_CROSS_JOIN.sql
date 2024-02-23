USE classicmodels;
-- COMMENTS TO RECALL THE TOPIC
/*
--> the CROSS JOIN clause returns a Cartesian product of rows from the joined tables.
--> the CROSS JOIN clause does not have a join predicate.
-->	In other words, it does not have the ON or USING clause.
--> If you add a WHERE clause, in case table t1 and t2 has a relationship, 
	the CROSS JOIN works like the INNER JOIN
--> 
*/

CREATE TABLE CARDTYPE (
	id int(5) AUTO_INCREMENT,
	cardtype varchar(10),
    PRIMARY KEY(id)
);

CREATE TABLE CARDVALUE (
	id int(5) auto_increment,
    cardValue varchar(5),
    PRIMARY KEY(id)
);

INSERT INTO CARDTYPE  
VALUES	(1 , 'hearts'),
		(2 ,'diamonds'),
		(3 ,'spades'),
		(4 ,'Clubs');
        
INSERT INTO CARDVALUE
VALUES	(1, 'A'),
		(2, '2'),
        (3, '3'),
        (4, '4'),
        (5, '5'),
        (6, '6'),
        (7, '7'),
        (8, '8'),
        (9, '9'),
        (10, '10'),
        (11 , 'J'),
        (12 , 'Q'),
        (13 , 'K');

SELECT * FROM CARDTYPE;
SELECT * FROM CARDVALUE;

SELECT cardtype , cardvalue 
FROM CARDTYPE 
CROSS JOIN CARDVALUE
order by cardtype;

-- EXAMPLE 2 

CREATE TABLE products2(
	id INT primary key auto_increment,
    product_name VARCHAR(100),
    price DECIMAL(13,2)
);

CREATE TABLE stores2(
	id INT PRIMARY KEY AUTO_INCREMENT,
    store_name VARCHAR(100)
);

CREATE TABLE sales2(
	product_id INT ,
    store_id INT,
    quantity DECIMAL(13,2) NOT NULL,
    sales_date DATE NOT NULL,
    PRIMARY KEY (product_id , store_id ),
    FOREIGN KEY(product_id)
		REFERENCES products2(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (store_id)
		REFERENCES stores2(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO products2(product_name, price)
VALUES('iPhone', 699),
      ('iPad',599),
      ('Macbook Pro',1299);

INSERT INTO stores2(store_name)
VALUES('North'),
      ('South');

INSERT INTO sales2(store_id,product_id,quantity,sales_date)
VALUES(1,1,20,'2017-01-02'),
      (1,2,15,'2017-01-05'),
      (1,3,25,'2017-01-05'),
      (2,1,30,'2017-01-02'),
      (2,2,35,'2017-01-05');

SELECT store_name,
		product_name,
        SUM(quantity*price) AS revenue
FROM 
	sales2
    INNER JOIN
    products2 ON products2.id = sales2.product_id
    INNER JOIN
    stores2 ON stores2.id = sales2.store_id
GROUP BY store_name , product_name;

/*
Now, what if you wish to determine which store had no sales of a particular product? The previously mentioned statement is unable to address this query.
To solve the problem, you can use the CROSS JOIN clause.
Sixth, use the CROSS JOIN clause to get the combination of all stores and products:
*/

SELECT 
	store_name, product_name
FROM 
	stores2 AS a
    CROSS JOIN
    products2 AS b ;
    
    
SELECT 
    b.store_name,
    a.product_name,
    IFNULL(c.revenue, 0) AS revenue
FROM
    products2 AS a
        CROSS JOIN
    stores2 AS b
        LEFT JOIN
    (SELECT 
        stores2.id AS store_id,
        products2.id AS product_id,
        store_name,
            product_name,
            ROUND(SUM(quantity * price), 0) AS revenue
    FROM
        sales2
    INNER JOIN products2 ON products2.id = sales2.product_id
    INNER JOIN stores2 ON stores2.id = sales2.store_id
    GROUP BY stores2.id, products2.id, store_name , product_name) AS c ON c.store_id = b.id
        AND c.product_id= a.id
ORDER BY b.store_name;

