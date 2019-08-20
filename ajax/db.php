<?php 
  
  include '../admin/connect.php';
    
  include '../includes/functions/functions.php';


header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");
header('Access-Control-Allow-Origin: http://localhost', true);


$conn= new mysqli($servername,$user,$password,$dbname);

if($conn->connect_error){
  die("connect err " . $conn->connect_error);
}else{
$conn->query("SET NAMES 'utf8'");
$conn->query("SET CHARACTER SET utf8");
}




    
?>

