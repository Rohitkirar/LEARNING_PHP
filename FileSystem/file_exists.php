<?php 
/*
file_exists() fn checks whether a file or directory exists.
Note the result of this function is cached. Use clearstatcache() to clear the cache.
Syntax
file_exists(path)
Return Value:	TRUE if the file or directory exists, FALSE on failure
*/
var_dump(file_exists("txtfile/source.txt"));
?>