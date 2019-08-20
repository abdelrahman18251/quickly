<?php 
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: text/html; charset=UTF-8");
    header('Access-Control-Allow-Origin: http://localhost', true);
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";
    
    $conn= new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error){
        die("connect err " . $conn->connect_error);
    }else{
      $conn->query("SET NAMES 'utf8'");
      $conn->query("SET CHARACTER SET utf8");
    }
?>
