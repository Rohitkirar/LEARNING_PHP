<?php 
/*
File Handling is an important part of any web application. You often need to open and process a file for different tasks.

PHP Manipulating Files
PHP has several function for creating , reading , uploading, and editing files.

Note : be careful when manipulating files !
when you are manipulating files you must be very careful.
you can do a lot of damage if you do something wrong. common error are : editing the wrong file, filling a harddrive with garbage data, and deleting the content of a file by accident.

functions of file handling

-> readfile() function is useful if all you want to do is open up a file and read its contents.

-> A better method to open files is with the fopen() function. This function gives you more options than the readfile() function.

-> SYNTAX fopen(filename , mode);

-> A list of possible modes for fopen() using mode
 mode	                Description
* 'r' : Open for reading only; place the file pointer at the beginning file
* 'r+' : Open for reading and writing; place the file pointer at the beginfile
* 'w' :	Open for writing only; place file pointer at beginningoffile and truncate the file to zero length. If file doesn't exist, attempt to create it.
* 'w+':	Open for reading and writing; otherwise has the same behavior as 'w'.
* 'a' : Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() has no effect, writes are always appended.
* 'a+' : Open for reading and writing; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() only affects the reading position, writes are always appended.
* 'x' : Create and open for writing only; place the file pointer at the beginning of the file. If the file already exists, the fopen() call will fail by returning false and generating an error of level E_WARNING. If the file does not exist, attempt to create it. This is equivalent to specifying O_EXCL|O_CREAT flags for the underlying open(2) system call.
* 'x+' : Create and open for reading and writing; otherwise it has the same behavior as 'x'.
* 'c' : Open the file for writing only. If the file does not exist, it is created. If it exists, it is neither truncated (as opposed to 'w'), nor the call to this function fails (as is the case with 'x'). The file pointer is positioned on the beginning of the file. This may be useful if it's desired to get an advisory lock (see flock()) before attempting to modify the file, as using 'w' could truncate the file before the lock was obtained (if truncation is desired, ftruncate() can be used after the lock is requested).
* 'c+' : Open the file for reading and writing; otherwise it has the same behavior as 'c'.
* 'e' : Set close-on-exec flag on the opened file descriptor. Only available in PHP compiled on POSIX.1-2008 conform systems.

-> 
*/

?>