<?php

session_start();

include_once("../connection/connection.php");
require_once("HTML_TO_DOC.php");


function randLetter()
{
    $int = rand(0,51);
    $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $rand_letter = $a_z[$int];
    return $rand_letter;
}



if(isset($_REQUEST['mod_id'])){

  $content=$des=$_REQUEST['des'];
$mod_id=$_REQUEST['mod_id'];


//echo $des;
//print_r($_REQUEST);

$htd = new HTML_TO_DOC();
$query="select * from module where mod_id=".$mod_id;

$get=mysqli_query($conn,$query);
$fetch=mysqli_fetch_assoc($get);

$file_name=NULL;
//echo $fetch['file_status'];

if($fetch['file_status']=='true'){





  $des=base64_encode($des);
//$file_name="admin/images/".randLetter()."document-2";
$file_name="admin/files/".rand()."document-2";
$query="update module set description='".$des."', m_file_path='".$file_name.".doc', file_status='false' where mod_id=".$mod_id;

if (!unlink("../".$fetch['m_file_path'])) {

 
}
else {

}



}
else{
  $des=base64_encode($des);
  $file_name=$fetch['m_file_path'];
  $query="update module set description='".$des."', file_status='false' where mod_id=".$mod_id;
}


//echo $file_name;


$htd->createDoc($content,"../". $file_name);






// header("Content-type:application/vnd.ms-word");
// header("Content-Disposition: attachment;Filename=".".../admin/images/1004727415final product lifecycle magagment.docx");
// header("Pragma:no-cache");
// header("Expires:0");

// echo "<div>".$des."</div>";




   // $query="update content set description='".$des."', status='false' where c_id=".$c_id;
    //echo $query;
    if(mysqli_query($conn,$query)){
echo "success";
    }
  //  echo"check";
}

?>