<?php
	

include 'db.php';





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors= array();




$Date = date("Y-m-d H:i:s");
        $name 	= $_POST['name'];
        $governorate = $_POST['governorate'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $types 	= $_POST['types'];
        $brands = $_POST['brands'];
        $brand = $_POST['brand'];
        $phone 	= $_POST['phone'];
        $defect = $_POST['defect'];

        function validate($str) {
            return trim(htmlspecialchars($str));
        }
     
      

            if(checkUsername($username)>=true){
                $result['status'] = "error";
                $result['data'] = ["اسم المستخدم غير متاح"];
                array_push($errors,$result['data']);
                //echo json_encode($result);
            }else{

    $sql = ("INSERT INTO `items` (`Name`,`Description`,`Add_Date`,`Image`,`Status`,`Approve`,`Cat_ID`,`address`,`mobile`,`phone`,`types`,`brands`,`brand`,`defect`) VALUES ('$name', '$defect','$Date', 'img', '1', '0', '$governorate', '$address', '$mobile','$phone','$types','$brands', '$brand', '$defect')");
   // $sql = ("INSERT INTO `users`(`Username`, `Password`, `Email`, `FullName`,`Date`, `phone`, `address`,`Governorate`, `types`, `brands`, `brand`, `jop`,`national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES ('$username','$password','$email','$name','$Date','$phone','$address','$governorate','$types','$brands','$brand','$jop','$national_ID','$qualification','$Commercial_Registration','$Issuer','$formNo14')");
    
    if(mysqli_query($conn, $sql)){
        $result['status'] = "success";
        $result['data'] = ["Records added successfully."];  
        array_push($errors,$result['data']);
        //echo json_encode($result);
    } else{
        $msg= "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        $result['status'] = "error";
        $result['data'] = ["$msg"];  
        array_push($errors,$result['data']);
        //echo json_encode($result);
    }
    
    mysqli_close($conn);
            }






    

        echo json_encode($errors);
}else {
	exit('Invalid Request');
}
	      ?>