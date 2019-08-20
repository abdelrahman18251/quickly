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
			$formErrors = array();
			$username 	= $_POST['username'];
			$password 	= $_POST['password'];
			$password2 	= $_POST['password2'];
			$email 		= $_POST['email'];
			if (isset($username)) {
				$filterdUser = filter_var($username, FILTER_SANITIZE_STRING);
				if (strlen($filterdUser) < 4) {
					$formErrors[] = 'Username Must Be Larger Than 4 Characters';
				}
			}
			if (isset($password) && isset($password2)) {
				if (empty($password)) {
					$formErrors[] = 'Sorry Password Cant Be Empty';
				}
				if (sha1($password) !== sha1($password2)) {
					$formErrors[] = 'Sorry Password Is Not Match';
				}
			}
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
					// Insert Userinfo In Database
					$stmt = $con->prepare("INSERT INTO 
											users(Username, Password, Email, RegStatus, Date)
										VALUES(:zuser, :zpass, :zmail, 0, now())");
					$stmt->execute(array(
						'zuser' => $username,
						'zpass' => sha1($password),
						'zmail' => $email
					));
					// Echo Success Message
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
			<input 
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
		</div>
		<div class="input-container">
			<input 
				class="form-control" 
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type your password" 
				required />
		</div>
		<input class="btn btn-primary btn-block" name="login" type="submit" value="Login" />
	</form>
	<!-- End Login Form -->
	<!-- Start Signup Form -->
	 <form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="input-container">
		<div class="input-group">
			<span class="input-group-text">username</span>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="input-group">
			<span class="input-group-text">name</span>
			<input type="text" class="form-control" name="name">
		</div>

		<div class="input-group">
			<span class="input-group-text">password</span>
			<input type="text" class="form-control" name="password">
		</div>

		<div class="input-group">
			<span class="input-group-text">password2</span>
			<input type="text" class="form-control" name="password2">
		</div>

		<div class="input-group">
			<span class="input-group-text">email</span>
			<input type="text" class="form-control" name="email">
		</div>

<!-- new items -->
<div class="input-group">
<span class="input-group-text">Governorate</span>

<select class="form-control" id="" name="Governorate">
			<option disabled selected> اختر المحافظة</option>
			<?php
	      	$allCats = getAllFrom("*", "categories", "where 1", "", "ID", "ASC");
			foreach ($allCats as $cat) {
				echo '<option value="'.$cat['id'].'"> ' . $cat['Name'] . '  </option>';
			}
	      ?>
			</select>
</div>
		<div class="input-group">
			<span class="input-group-text">address</span>
			<input type="text" class="form-control" name="address">
		</div>
	

		<div class="input-group">
			<span class="input-group-text">mobile</span>
			<input type="text" class="form-control" name="mobile">
		</div>
		<div class="input-group">
<span class="input-group-text">types</span>
		<select class="form-control types" name="types" >
				<option value="" disabled selected>اختر الشغلانه </option>
		      <option value="1"> اجهزة منزلية </option>
		      <option value="2">تكييف مركزي </option>
		    </select>
			<div>
			<div class="input-group">
<span class="input-group-text">types</span>
	<select  class="form-control Brands" id="" name="Brands">
			<option disabled selected> اختر  نوع الماركة</option>
			<?php
	      	$allCats = getAllBrands();
			foreach ($allCats as $cat) {
				echo '<option value="'.$cat['id'].'"> ' . $cat['Brandsname'] . '  </option>';
			}
	      ?>
</select>
</div>




<div class="input-group">
<span class="input-group-text Brand">type</span>
<select  class="form-control " id="brndslct"  name="">
			<option disabled selected>اختر النوع</option>
			
</select>
</div>

<div class="input-group">
<span class="input-group-text">الوظيفة</span>
			<select class="form-control jop" name="jop" >
			  <option disabled selected> اختر الوظيفة  </option> 
			  <option value="1"> فني متخصص </option> 
			  <option value="2"> مركز خدمو متخصص </option> 
			  <option value="3">مركز خدمة معتمد</option>
			  <option value="4">وكيلاء تجاريون</option>
			  <option value="5">وكلاء مصنعون</option>
			  
			   <option class="del_ showif " value="6">فني كنترول</option>
		       <option class=" del_ showif"   value="7">فني كباسات</option>
		    </select>
		</div>


<!-- end items ------- -->
<!-- /////**** ACTIONS ****///// -->
<!-- 1 -->
<div class="input-group del national_ID">
			<span class="input-group-text">الرقم القومي</span>
			<input type="text" class="form-control" name="national_ID">
</div>

<div class="form-group del qualification">
    <label for="">المؤهل</label>
    <select class="form-control" name="qualification">
      <option disabled selected>اختار المؤهل</option>
      <option>مؤهل عالي</option>
      <option>فوق المتوسط</option>
      <option>معهد فني صنايعي</option>
	  <option>نظام 5 سنوات صنايعي</option>
	  <option>فوق المتوسط</option>
      <option>معهد فني صنايعي</option>
	  <option>نظام 5 سنوات صنايعي</option>
	  
    </select>
  </div>

<!--  -->
<!-- 2 -->
<div class="input-group del phone">
			<span class="input-group-text"> الرقم الارضي </span>
			<input type="text" class="form-control" name="phone">
</div>
		<div class="input-group del Commercial_Registration">
			<span class="input-group-text">السجل التجاري</span>
			<input type="number" class="form-control" name="Commercial_Registration">
		</div>
		<div class="input-group del Issuer">
			<span class="input-group-text">جهة اصدار السجل التجاري </span>
			<input type="text" class="form-control" name="Issuer">
		</div>
<!-- 4 -->
<div class="input-group del formNo14">
			<span class="input-group-text"> استمارة رقم 14 رقم</span>
			<input type="text" class="form-control" name="formNo14">
		</div>


<!-- /////**** ACTIONS ****///// -->





		<input class="btn btn-success btn-block" name="signup" type="submit" value="Signup" />
	</form>


			
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