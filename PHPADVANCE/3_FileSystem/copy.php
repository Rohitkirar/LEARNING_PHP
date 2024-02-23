<?php 
/*
copy() function copies a file.
Note : If the to_file already exists it will be overwritten
Syntax : 
copy(from_file , to_file , context);

Parameter	Description
from_file - Required. Specifies the path to the file to copy from
to_file - Required. Specifies the path to the file to copy to
context - Optional. Specifies a context resource created with stream_context_create()
Return Value:	TRUE on success, FALSE on failure

*/

echo copy("source.txt" , "target.txt");

echo copy("source.txt" , "txtfile/source.txt");

echo copy("target.txt" , "txtfile/target.txt");
?>