/*
MySQL treats the views as tables with the type 'VIEW'.

Therefore, you can use the SHOW FULL TABLES statement to display all views 
in the current database as follows:

SHOW FULL TABLES
[{FROM | IN } database_name]
WHERE table_type = 'VIEW';

-- SHOW CREATE VIEW statement allows you to display the statement that creates a view. 

SHOW CREATE VIEW view_name;
*/;

SHOW FULL TABLES 
WHERE table_type = 'VIEW';

SHOW FULL TABLES FROM classicmodels WHERE table_type = 'View';

-- SHOW CREATE VIEW statement allows you to display the statement that creates a view. :
;
SHOW CREATE VIEW contractor ; -- to see query of VIEW


-- Use the SHOW CREATE VIEW statement to display the statement used to create the view.