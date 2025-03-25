<?php
include '../admin/db_connect.php';
header("Content-Type: application/json");
 
$data = json_decode(file_get_contents('php://input'), true);

if($data['item'] === 'All categories'){
  $sql = 'select * from Common_price';

}else if($data['item'] === 'Hair'){
  $sql = 'select scissor from Common_price';

}else if($data['item'] === 'face'){
  $sql = 'select beared from Common_price';

}else if($data['item'] === 'combo'){
  $sql = 'select buzz,clipper from Common_price';

}else if($data['item'] === 'uncategories'){
  $sql = 'select strait_razor from Common_price';
}
 
 $result = mysqli_query($conn,$sql);
 $arr = [];
 while($row = mysqli_fetch_assoc($result)){
      array_push($arr, $row);
 }

  echo json_encode(['status'=>'success','data'=>$arr]);
 
?>