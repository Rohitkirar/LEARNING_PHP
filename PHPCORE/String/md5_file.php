<?php
$md5file = file_get_contents("string/md5file.txt");
if (md5_file("test.txt") == $md5file)
  {
  echo "The file is ok.";
  }
else
  {
  echo "The file has been changed.";
  }
?>