<?php
	ob_start();
	session_start();
	$pageTitle = 'Login';
	if (isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	include 'init.php';
	// Check If User Coming From HTTP Post Request
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) {
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$hashedPass = sha1($pass);
			// Check If The User Exist In Database
			$stmt = $con->prepare("SELECT 
										UserID, Username, Password 
									FROM 
										users 
									WHERE 
										Username = ? 
									AND 
										Password = ?");
			$stmt->execute(array($user, $hashedPass));
			$get = $stmt->fetch();
			$count = $stmt->rowCount();
			// If Count > 0 This Mean The Database Contain Record About This Username
			if ($count > 0) {
				$_SESSION['user'] = $user; // Register Session Name
				$_SESSION['uid'] = $get['UserID']; // Register User ID in Session
				header('Location: index.php'); // Redirect To Dashboard Page
				exit();
			}
		} else {
			echo "<pre>" ;
			print_r($_POST);
			echo "</pre>";
			
			// $username 	= $_POST['username'];
			// $password 	= $_POST['password'];
			// $password2 	= $_POST['password2'];
			// $email 		= $_POST['email'];


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
			$edu = $_POST['edu'];
			$phone 	= $_POST['phone'];
			$Commercial_Registration = $_POST['Commercial_Registration'];
			$Issuer = $_POST['Issuer'];
			$formNo14 = $_POST['formNo14'];


			if (isset($username)) {
				$filterdUser = filter_var($username, FILTER_SANITIZE_STRING);
				if (strlen($filterdUser) < 4) {
					$formErrors[] = 'Username Must Be Larger Than 4 Characters';
				}
			}
			// if (isset($password) && isset($password2)) {
			// 	if (empty($password)) {
			// 		$formErrors[] = 'Sorry Password Cant Be Empty';
			// 	}
			// 	if (sha1($password) !== sha1($password2)) {
			// 		$formErrors[] = 'Sorry Password Is Not Match';
			// 	}
			// }
			if (isset($email)) {
				$filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
				if (filter_var($filterdEmail, FILTER_VALIDATE_EMAIL) != true) {
					$formErrors[] = 'This Email Is Not Valid';
				}
			}
			// Check If There's No Error Proceed The User Add
			if (empty($formErrors)) {
				// Check If User Exist in Database
				$check = checkItem("Username", "users", $username);
				if ($check == 1) {
					$formErrors[] = 'Sorry This User Is Exists';
				} else {
		
			// 	$now = date("Y-m-d H:i:s");
			// 	$stmt = $con->prepare("INSERT INTO `users`(`Username`, `Password`, `Email`, `FullName`,`Date`, `phone`, `address`,`Governorate`, `types`, `brands`, `brand`, `jop`,`national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES (:mUsername,:mPassword,:mEmail,:mFullName,:mDate,:mphone,:maddress,:mGovernorate,:mtypes,:mbrands,:mbrand,:mjop,:mnational_ID,:mqualification,:mCommercial_Registration,:mIssuer,:mformNo14)");

			// 	$stmt->execute(array(
			// 	'mUsername' => $username,
			// 	'mPassword' => sha1($password),
			// 	'mEmail' => $email,
			// 	'mFullName' => $name,
			// 	'mGovernorate' => $governorate,
			// 	'maddress' => $address,
			// 	'mmobile' => $mobile,
			// 	'mbrands' => $types,
			// 	'mbrands' => $brands,
			// 	'mbrand' => $bran,
			// 	'mjop' => $jop,
			// 	'mnational_ID' => $national_ID,
			// 	'mqualification' => $edu,
			// 	'mphone' => $phone,
			// 	'mCommercial_Registration' => $Commercial,
			// 	'mIssuer' => $Issuer,
			// 	'mformNo14' => $formNo14,
			// 	'mDate'=>$now
			// ));

			// 	$stmt = $con->prepare("INSERT INTO `users`(`Username`, `Password`, `Email`, `FullName`,`Date`, `phone`, `address`,`Governorate`, `types`, `brands`, `brand`, `jop`,`national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES (:mUsername,:mPassword,:mEmail,:mFullName,:mDate,:mphone,:maddress,:mGovernorate,:mtypes,:mbrands,:mbrand,:mjop,:mnational_ID,:mqualification,:mCommercial_Registration,:mIssuer,:mformNo14)");

			$sql = "INSERT INTO `users`(`Username`, `Password`, `Email`, `FullName`,`Date`, `phone`, `address`,`Governorate`, `types`, `brands`, `brand`, `jop`,`national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES (:mUsername,:mPassword,:mEmail,:mFullName,:mDate,:mphone,:maddress,:mGovernorate,:mtypes,:mbrands,:mbrand,:mjop,:mnational_ID,:mqualification,:mCommercial_Registration,:mIssuer,:mformNo14)";
			
			$stmt = $con -> prepare($sql);
				$stmt -> execute( array(
				":musername" => $_POST['username'],
				":mpassword" => $_POST['password'],
				":memail" => $_POST['email'],
				":mname" => $_POST['name'],
				":mgovernorate" => $_POST['governorate'],
				":maddress" => $_POST['address'],
				":mmobile" => $_POST['mobile'],
				":mtypes" => $_POST['types'],
				":mbrands" => $_POST['brands'],
				":mbrand" => $_POST['brand'],
				":mjop" => $_POST['jop'],
				":mnational_ID" => $_POST['national_ID'],
				":medu" => $_POST['edu'],
				":mphone" => $_POST['phone'],
				":mCommercial" => $_POST['Commercial'],
				":mIssuer" => $_POST['Issuer'],
				":mformNo14" => $_POST['formNo14']

				// 	'mUsername' => $username,
				// 	'mPassword' => sha1($password),
				// 	'mEmail' => $email,
				// 	'mFullName' => $name,
				// 	'mGovernorate' => $governorate,
				// 	'maddress' => $address,
				// 	'mmobile' => $mobile,
				// 	'mbrands' => $types,
				// 	'mbrands' => $brands,
				// 	'mbrand' => $bran,
				// 	'mjop' => $jop,
				// 	'mnational_ID' => $national_ID,
				// 	'mqualification' => $edu,
				// 	'mphone' => $phone,
				// 	'mCommercial_Registration' => $Commercial,
				// 	'mIssuer' => $Issuer,
				// 	'mformNo14' => $formNo14,
				// 	'mDate'=>$now

			));
							



					$succesMsg = 'Congrats You Are Now Registerd User';
				}
			}
		}
	}
?>

<div class="container login-page">
	<h1 class="text-center">
		<span class="selected" data-class="login">Login</span> | 
		<span data-class="signup">Signup</span>
	</h1>


	<!-- Start Login Form -->
	<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="input-container">
			<input  class="form-control"  type="text" id="LoginUsername"  name="username"  autocomplete="off" placeholder="Type your username"  required />
		</div>
		<div class="input-container">
			<input class="form-control" type="password" id="LoginPassword" name="password" autocomplete="new-password" placeholder="Type your password" required />
		</div>
		<input class="btn btn-primary btn-block" name="login" type="submit" value="Login" />
	</form>
	<!-- End Login Form -->

	<!-- Start Signup Form -->
	<!-- <form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"> -->

	 <form class="signup" id="signup" novalidate>
		<div class="input-container">

		<div class="input-group">
			<span class="input-group-text">username</span>
			<input type="text" class="form-control" id="username" name="username" data-validation="alphanumeric" data-validation-allowing="-_">
		</div>

		<div class="input-group">
			<span class="input-group-text">name</span>
			<input type="text" class="form-control" id="name" name="name" data-validation="required">
		</div>

		<div class="input-group">
			<span class="input-group-text">password</span>
			<input type="password" class="form-control" id="password" name="password" data-validation="length" data-validation-length="min8">
		</div>

		<div class="input-group">
			<span class="input-group-text">password2</span>
			<input type="password" class="form-control" id="password2" name="password2"  data-validation="confirmation" data-validation-confirm="password">
		</div>

		<div class="input-group">
			<span class="input-group-text">email</span>
			<input type="email" class="form-control" id="email" name="email" data-validation="email">
		</div>

		<div class="input-group">
			<span class="input-group-text">Governorate</span>
			<select class="form-control " id="" name="governorate" required="" id="governorate">
						<option value="" selected disabled="disabled"> اختر المحافظة</option>
						<?php
						$allCats = getAllFrom("*", "categories", "where 1", "", "ID", "ASC");
						foreach ($allCats as $cat) {
							echo '<option value="'.$cat['Name'].'"> ' . $cat['Name'] . '  </option>';
						}
					?>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-text">address</span>
			<input type="text" class="form-control" id="address" name="address" data-validation="required">
		</div>

		<div class="input-group">
			<span class="input-group-text">mobile</span>
			<input type="text" class="form-control" id="mobile" name="mobile" maxlength="11" data-validation="number">
		</div>

		<div class="input-group">
		<span class="input-group-text">types</span>
			<select class="form-control types" name="types" required="" id="types">
				<option value="" disabled="disabled" selected>اختر الشغلانه </option>
				<option value="1"> اجهزة منزلية </option>
				<option value="2">تكييف مركزي </option>
			</select>
		<div>



			<div class="input-group">
			<span class="input-group-text">types</span>
				<select  class="form-control Brands" name="brands" required="" id="brands">
						<option  value="" disabled="disabled" selected> اختر  نوع الماركة</option>
						<?php
						$allCats = getAllBrands();
						foreach ($allCats as $cat) {
							echo '<option value="'.$cat['id'].'"> ' . $cat['Brandsname'] . '  </option>';
						}
					?>
				</select>
			</div>


			<div class="input-group">
			<span class="input-group-text brand">type</span>
				<select  class="form-control " id="brndslct" id="brand"  name="brand" required="">
					<option value="" disabled="disabled" selected>اختر النوع</option>
				</select>
			</div>

			<div class="input-group">
			<span class="input-group-text">الوظيفة</span>
				<select class="form-control jop" name="jop" id="jop" required="">
					<option  value="" disabled="disabled" selected> اختر الوظيفة  </option> 
					<option value="1"> فني متخصص </option> 
					<option value="2"> مركز خدمو متخصص </option> 
					<option value="3">مركز خدمة معتمد</option>
					<option value="4">وكيلاء تجاريون</option>
					<option value="5">وكلاء مصنعون</option>
					<option class="del_ showif " value="6">فني كنترول</option>
					<option class=" del_ showif"   value="7">فني كباسات</option>
				</select>
			</div>

<!-- /////**** ACTIONS ****///// -->
<!-- 1 -->
<div class="input-group del national_ID">
			<span class="input-group-text">الرقم القومي</span>
			<input type="text" class="form-control" name="national_ID" id="national_ID"  maxlength="14" data-validation="number">


			<br>
<label for="input-group-text">المؤهل</label>
		<select class="form-control" name="edu" required="" id="edu">
				<option  value="" disabled="disabled" selected>اختار المؤهل</option>
				<option value="مؤهل عالي">مؤهل عالي</option>
				<option value="فوق المتوسط">فوق المتوسط</option>
				<option value="معهد فني صنايعي">معهد فني صنايعي</option>
				<option value="نظام 5 سنوات صنايعي">نظام 5 سنوات صنايعي</option>
				<option value="فوق المتوسط">فوق المتوسط</option>
				<option value="معهد فني صنايعي">معهد فني صنايعي</option>
				<option value="نظام 5 سنوات صنايعي">نظام 5 سنوات صنايعي</option>
    </select>


</div>
<div class="del">

</div>
<!--  -->
<!-- 2 -->
		<div class="input-group del phone">
					<span class="input-group-text"> الرقم الارضي </span>
					<input type="text" class="form-control" name="phone" id="phone" maxlength="11" data-validation="number">
		</div>

		<div class="input-group del Commercial_Registration">
			<span class="input-group-text">السجل التجاري</span>
			<input type="number" class="form-control" name="Commercial_Registration" id="Commercial_Registration">
		</div>

		<div class="input-group del Issuer">
			<span class="input-group-text">جهة اصدار السجل التجاري </span>
			<input type="text" class="form-control" name="Issuer" id="Issuer">
		</div>

<!-- 4 -->
		<div class="input-group del formNo14">
					<span class="input-group-text"> استمارة رقم 14 رقم</span>
					<input type="number" class="form-control" name="formNo14" id="formNo14">
		</div>
		<input class="btn btn-success btn-block" name="signup" type="submit" value="Signup" />
	</form>
<div class="errors">
</div>

	<!-- End Signup Form -->
	<div class="the-errors text-center">
		<?php /////////
			if (!empty($formErrors)) {
				foreach ($formErrors as $error) {
					echo '<div class="msg error">' . $error . '</div>';
				}
			}
			if (isset($succesMsg)) {
				echo '<div class="msg success">' . $succesMsg . '</div>';
			}
		?>
	</div>

</div>

<?php 
	include $tpl . 'footer.php';
	ob_end_flush();
?>