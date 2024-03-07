/*
* MYSQL Stored PROCEDURE
* By definition, a stored procedure is a set of declarative SQL statements stored within the MySQL Server. 

* The initial invocation of a stored procedure involves the following actions by MySQL:

    First, find the stored procedure by its name in the database catalog.
    Second, compile the code of the stored procedure.
    Third, store the compiled stored procedure in a cache memory area.
    Finally, execute the stored procedure.

* NOTE : If you invoke the same stored procedure again within the same session, MySQL will execute it from the cache without the need for recompilation.

* A stored procedure can have parameters, allowing you to pass values to it and retrieve results.

* a stored procedure may incorporate control flow statements such as IF, CASE, and LOOP.

* MYSQL ADVANTAGES OF STORED PROCEDURE
1) Reduce network traffic
2) Centralize business logic in the database
3) Make the database more secure

* MySQL stored procedures disadvantages
1) Troubleshooting – Debugging stored procedures is quite challenging.
2) Resource usage 
3) Maintenances – Developing and maintaining stored procedures often demands a specialized skill 
*/