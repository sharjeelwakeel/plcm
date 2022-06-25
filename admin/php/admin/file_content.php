<?php

include("../../../converter.php"); 


if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
    $file_path="files/".rand().$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../../".$file_path);
//echo$file_path;
    $g=new DocxConversion("../../".$file_path);
 $final_content=$g-> convertToText();
echo $final_content;
if (!unlink("../../".$file_path)) {

 
}
else {
    

}


    
// $phpmailer->addAttachment("../../".$file_path,"file_text");
}//if end

 
?>