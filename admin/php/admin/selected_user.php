<?php


session_start();
include_once("../../connection/connection.php");


if(isset($_REQUEST['category'])){

$category=$_REQUEST['category'];
$query="select * from members where category='".$category."'";

$get=mysqli_query($conn,$query);
$user="<ul class='checklist'>";

if(mysqli_num_rows($get)>0){
    while($pro=mysqli_fetch_assoc($get)){
     $user.= "<li tabindex='0'><input type='checkbox' value='". $pro['m_id']."' name='skills[]' id='skills_".$pro['m_id']."'><label for='skills_".$pro['m_id']."' class='leaveRoomForCheckbox'>". $pro['f_name']." ".$pro['l_name']."</label> </li>";
                                       
    }

}
}
$user.="</ul>";

echo $user;


?>