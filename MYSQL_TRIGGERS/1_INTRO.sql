
MYSQL TRIGGERS:-a trigger is a stored program invoked automatically in response to an event
                such as insert, update, or delete;

For example, you can define a trigger that is invoked automatically before a new row is 
inserted into a table.;

MySQL supports triggers that are invoked in response to the INSERT, UPDATE or DELETE event.;

The SQL standard defines two types of triggers: 
    1) row-level triggers  
    2) statement-level triggers.;

ROW-LEVEL : 
    A row-level trigger is activated for each row that is inserted, updated, or deleted.;

    For example, if a table has 100 rows inserted, updated, or deleted, the trigger is 
    automatically invoked 100 times for the 100 rows affected.;

STATEMENT-LEVEL:
    A statement-level trigger is executed once for each transaction regardless of 
    how many rows are inserted, updated, or deleted.;

NOTE : MySQL supports only row-level triggers. It doesn’t support statement-level triggers.;


Advantages of triggers

Triggers provide another way to check the integrity of data.
Triggers handle errors from the database layer.
Triggers give an alternative way to run scheduled tasks. By using triggers, you don’t have to wait for the scheduled events to run because the triggers are invoked automatically before or after a change is made to the data in a table.
Triggers can be useful for auditing the data changes in tables.;

Disadvantages of triggers

Triggers can only provide extended validations, not all validations. For simple validations, you can use the NOT NULL, UNIQUE, CHECK and FOREIGN KEY constraints.
Triggers can be difficult to troubleshoot because they execute automatically in the database, which may not be visible to the client applications.
Triggers may increase the overhead of the MySQL server.;
