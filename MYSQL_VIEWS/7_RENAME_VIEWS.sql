/*
In MySQL, views and tables share the same namespace. 
Therefore, you can use the RENAME TABLE statement to rename a view.

RENAME TABLE original_view_name 
TO new_view_name;
*/

-- Use the RENAME TABLE statement to rename a view.

RENAME TABLE oldviewname TO newVIEWname;
