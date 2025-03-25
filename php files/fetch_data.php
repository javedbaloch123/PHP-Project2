<?php
include '../admin/db_connect.php';
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['col_id'])){

 $sql = 'select * from barber_info where id = '.$data['col_id'].'';
 $result = mysqli_query($conn,$sql);
 $arr = [];
 while($row = mysqli_fetch_assoc($result)){
     $arr[] = $row;
 }
  echo json_encode(['status'=>'success','data'=>$arr]);
}
?>