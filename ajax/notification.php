<?php 

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'db.php';
 $Cat_ID = $_POST['cat_id'];
  $sql = "SELECT * FROM `items` WHERE `Cat_ID`= $Cat_ID  AND Status = 1";



$res = $conn->query($sql);

if($res->num_rows > 0 ) {
    $result['status'] = "success";
    while($r = mysqli_fetch_assoc($res)) {
      $result['data'][] = $r ;
    }
}else{
 //$resulta['status'] = "error";
 $result['data'] = [];
 
}
echo json_encode($result);

$conn->close();
}
?>