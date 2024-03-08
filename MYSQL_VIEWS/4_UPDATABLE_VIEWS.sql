/*

In MySQL, views are not only queryable but also updatable.

WE can INSERT , UPDATE , DELETE DATA from base table using view also

 to create an updatable view, the SELECT statement defining the view must not contain any of the following elements:

Aggregate functions, DISTINCT , GROUP BY clause, HAVING clause, UNION or UNION ALL clause.
Left join or outer join, Subquery in the SELECT clause , Reference non-updatable views in the FROM clause.
Use literal values, Multiple references to any column of the base table.

If you create a view with the TEMPTABLE algorithm, the view is not updatable.

*/

SELECT * FROM offices;

CREATE VIEW officeInfo AS
SELECT officeCode , phone , city FROM offices;

SELECT * FROM officeInfo;

INSERT INTO officeInfo (officeCode , phone , city)
VALUES (8 , '123456789' , 'Ahemdabaad');
INSERT INTO officeInfo (officeCode , phone , city)
VALUES (9 , '123456789' , '1Ahemdabaad');
INSERT INTO officeInfo (officeCode , phone , city)
VALUES (10 , '123456789' , '2Ahemdabaad');


-- only colname or field are insert ,update , delete that are present in view
INSERT INTO officeInfo(officeCode , phone , city , state , country)
VALUES(10 , '9876543210' , 'BHOPAL' , 'MAdhya Pradesh' , 'India'); -- ERROR

UPDATE officeInfo
SET city = 'BHOPAL' WHERE officeCode = 7;


DELETE FROM officeInfo
WHERE officecode = 9;