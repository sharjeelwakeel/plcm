<?php

session_start();

include_once("../connection/connection.php");

//  print_r($_REQUEST);

if(isset($_REQUEST['table'])&&isset($_REQUEST['active'])){
    $table=$_REQUEST['table'];
    $data=$_REQUEST['data'];
    $id=$_REQUEST['id'];

    $col1='';
    $col2='';
    if($table=='speciality'){
        $col='s_id';
        $col2='s_name';
    }
    else if($table=='designation'){
        $col='d_id';
        $col2='d_name';
    }
    else if($table=='category'){
        $col='d_id';
        $col2='c_name';
    }
    else if($table=='technology'){
        $col='t_id';
        $col2='t_name';
    }
    else if($table=='storage'){
    
        $col='d_id';
        $col2='name';
    }
    else if($table=='cpu'){
        $col='c_id';
        $col2='name';
    }

    else if($table=='operating_system'){
    
        $col='o_id';
        $col2='name';
    }
    else if($table=='browser'){
        $col='b_id';
        $col2='name';
    }

    $query="update  ".$table." set ".$col2."='".$data."' where ".$col."=".$id;
    // echo $query;
    if(mysqli_query($conn,$query))
    {
        echo "success";
    }
    else{
        echo"fail";
    }
}