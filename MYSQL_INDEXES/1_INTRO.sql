/*
An index is a data structure such as a B-Tree that improves the speed of data retrieval
on a table at the cost of additional writes and storage to maintain it

The query optimizer may use indexes to quickly locate data without having to scan every row
in a table for a given query.

When you create a table with a primary key or unique key, MySQL automatically creates a special index named PRIMARY. 
This index is called the clustered index.

Other indexes other than the PRIMARY index are called secondary indexes or 
non-clustered indexes.

*/