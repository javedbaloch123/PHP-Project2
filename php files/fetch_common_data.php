<?php
include '../admin/db_connect.php';
header("Content-Type: application/json");
 

 $sql = 'select * from Common_price';
 $result = mysqli_query($conn,$sql);
 $arr = [];
 while($row = mysqli_fetch_assoc($result)){
     $arr[] = $row;
 }
  echo json_encode(['status'=>'success','data'=>$arr]);
 
?>