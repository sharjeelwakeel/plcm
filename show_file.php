
<?php

$file=$_REQUEST['file'];
//Add header to load pdf file
header('Content-type: application/msword'); 
header('Content-Disposition: inline; filename="' .$file. '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile($file);  

?>