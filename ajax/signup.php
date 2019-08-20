<?php
	

include 'db.php';





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors= array();




$Date = date("Y-m-d H:i:s");
      $username 	= $_POST['username'];
        $name 	= $_POST['name'];
        $password 	= $_POST['password'];
        $password2 	= $_POST['password2'];
        $email 	= $_POST['email'];
        $governorate = $_POST['governorate'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $types 	= $_POST['types'];
        $brands = $_POST['brands'];
        $brand = $_POST['brand'];
        $jop = $_POST['jop'];
        $national_ID = $_POST['national_ID'];
        $qualification = $_POST['edu'];
        $phone 	= $_POST['phone'];
        $Commercial_Registration = $_POST['Commercial_Registration'];
        $Issuer = $_POST['Issuer'];
        $formNo14 = $_POST['formNo14'];

        function validate($str) {
            return trim(htmlspecialchars($str));
        }

        if (strlen(validate($_POST['password'])) < 6) {
            $result['status'] = "error";
            $result['data'] = ["يرجي كتابة رقم سري اكبر من 6 أحرف"];
            
            array_push($errors,$result['data']);
            //echo json_encode($result);
        }
        else if (!filter_var(validate($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $result['status'] = "error";
            $result['data'] = ["يرجي ادخال بريد اليكتروني صحيح"];
            array_push($errors,$result['data']);
            //echo json_encode($result);
        }
        else if (strlen(validate($_POST['mobile'])) < 11 || strlen(validate($_POST['mobile'])) > 11) {
            $result['status'] = "error";
            $result['data'] = [" يرجي ادخال  رقم موبايل  صحيح يتكون من 11 رقم"];
            array_push($errors,$result['data']);
            //echo json_encode($result);
        }
        else{

            if(checkUsername($username)>=true){
                $result['status'] = "error";
                $result['data'] = ["اسم المستخدم غير متاح"];
                array_push($errors,$result['data']);
                //echo json_encode($result);
            }else{
    $sql = ("INSERT INTO `users`(`Username`, `Password`, `Email`, `FullName`,`Date`, `phone`, `address`,`Governorate`, `types`, `brands`, `brand`, `jop`,`national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES ('$username','$password','$email','$name','$Date','$phone','$address','$governorate','$types','$brands','$brand','$jop','$national_ID','$qualification','$Commercial_Registration','$Issuer','$formNo14')");
    
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

        }





    

        echo json_encode($errors);
}else {
	exit('Invalid Request');
}
	      ?>