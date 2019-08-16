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
			<!-- <input 
				pattern=".{4,}"
				title="Username Must Be Between 4 Chars"
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
		</div>
		<div class="input-container">
			<input 
				minlength="4"
				class="form-control" 
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type a Complex password" 
				required />
		</div>
		<div class="input-container">
			<input 
				minlength="4"
				class="form-control" 
				type="password" 
				name="password2" 
				autocomplete="new-password"
				placeholder="Type a password again" 
				required />
		</div>


		<div class="input-container">
			<input 
				class="form-control" 
				type="email" 
				name="email" 
				placeholder="Type a Valid email" />
		</div>  -->


		<div class="input-group">
			<span class="input-group-text">username</span>
			<input type="text" class="form-control" name="username">
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

<select name="form-control" id="" name="Governorate">
			<option value=""> اختر المحافظة</option>
			<option value="أسوان">أسوان</option>
			<option value="أسيوط">أسيوط</option>
			<option value="أسيوط">أسيوط</option>
			<option value="الإسكندريه">الإسكندريه</option>
			<option value="الإسماعيليه">الإسماعيليه</option>
			<option value="الأقصر">الأقصر</option>
			<option value="الجيزه">الجيزه</option>
			<option value="الخارجه">الخارجه</option>
			<option value="الزقازيق">الزقازيق</option>
			<option value="السويس">السويس</option>
			<option value="الطور">الطور</option>
			<option value="العريش">العريش</option>
			<option value="الغردقه">الغردقه</option>
			<option value="الفيوم">الفيوم</option>
			<option value="القاهره">القاهره</option>
			<option value="المنصوره">المنصوره</option>
			<option value="المنيا">المنيا</option>
			<option value="بنها">بنها</option>
			<option value="بني سويف">بني سويف</option>
			<option value="بورسعيد">بورسعيد</option>
			<option value="دمنهور">دمنهور</option>
			<option value="دمياط">دمياط</option>
			<option value="سوهاج">سوهاج</option>
			<option value="شبين الكوم">شبين الكوم</option>
			<option value="طنطا">طنطا</option>
			<option value="قنا">قنا</option>
			<option value="كفر الشيخ">كفر الشيخ</option>
			<option value="مرسى مطروح">مرسى مطروح</option>
			</select>



		<div class="input-group">
			<span class="input-group-text">address</span>
			<input type="text" class="form-control" name="address">
		</div>
	

		<div class="input-group">
			<span class="input-group-text">mobile</span>
			<input type="text" class="form-control" name="mobile">
		</div>

		<select class="form-control types" name="types" >
				<option value="" disabled selected>اختر الشغلانه </option>
		      <option value="1"> اجهزة منزلية </option>
		      <option value="2">تكييف مركزي </option>
		    </select>
			<div>

			<!-- 


الأجهزة الأمريكية(ج
نرال اليكتريك - هوت بوينت - فريجيدير - وستنجهاوس - سبيت كوين-اخري  - مالي  - نورج - امانة)
الأجهزةالألمانية (AEG - سيمينس - وايت ويستنج هاوس  - اخري )
الأجهزة الأيطالية (كلفينيتور - اريستون - زانوسي - وايت بوينت- فاجور - اندست - اخري)
الأجهزة المصرية (كولدير - ايديال زانوسي - كريازي - توشيبا - شارب - سيتال - الاسكا - يونيون اير - كارير- تورنيدو - اليكتروستار  - اساب  - سوناي  - فريش - اخري )
الأجهزة الفرنسية(براندت - ليونارد )
الاجهزة اليابانية (بانوسينك - 
الأجهزة التركية ( بيكو 
الأجهزة الأسبانية 
1
2

الأجهزة الأمريكية 
الأجهزة الايطالية
الأجهزة الاسبانية 
الأجهزة الفرنسية
الأجهزة المصريةالأجهزة الصينية 
الأجهزةة اليابانية
الأجهزة التركية
اي خدمة ؟؟
تمام

			 -->
	<select  class="form-control" id="" name="Brands">
			<option disabled selected> اختر  نوع الماركة</option>
			<option value="الأجهزة الأمريكية">الأجهزة الأمريكية</option>
			<option value="الأجهزة الايطالية">الأجهزة الايطالية </option>
			<option value="الأجهزة الاسبانية">الأجهزة الاسبانية </option>
			<option value="الأجهزة الفرنسية">الأجهزة الفرنسية </option>
			<option value="الأجهزة المصرية">الأجهزة المصرية </option>
			<option value="الأجهزة اليابانية">الأجهزة اليابانية </option>
			<option value="الأجهزة التركية">الأجهزة التركية </option>
</select>
			 <!--الأجهزة الأمريكية-->


<select  class="form-control del__" id="" name="Brands">
			<option disabled selected>اختر الماركة</option>
			<option value="">جنرال اليكتريك</option>
			<option value="">هوت بوينت</option>
			<option value="">وستنجهاوس</option>
			<option value="">فريجيدير</option>
			<option value="">سبيت كوين</option>
			<option value="">نورج</option>
			<option value="">امانا</option>
			<option value="">مالي</option>
</select>
			 <!--الأجحهزة الألمانية-->


<select  class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			<option value="">بوش</option>
			<option value="">AEG</option>
			<option value="">سيمينس</option>
			<option value="">وايت ويستنج هاوس</option>
</select>
			 <!--الأجهزة الأيطالية-->

<select  class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			<option value="">اريستون</option>
			<option value="">زانوسي</option>
			<option value="">اندست</option>
			<option value="">وايت بوينت </option>
			<option value="">كلفينيتور </option>
			<option value="">فاجور </option>

</select>
			 <!--الأجهزة المصرية -->

<select  class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			<option value="">كولدير</option>
			<option value="">ايديال وانوسي </option>
			<option value="">كرباوي</option>
			<option value="">توشيبا</option>
			<option value="">شارب</option>
			<option value="">سيتال</option>
			<option value="">الاسكا</option>
			<option value="">يونيون اير</option>
			<option value="">كارير</option>
			<option value="">فريش</option>
			<option value="">تورنيدو</option>
			<option value="">اليكتروستار</option>
			</option>
			 <!--الأجهزة الفرنسية-->

</select>
<select  class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			<option value="">براندت</option>
			<option value="">ليونارد </option>
			</option>
			 <!--الأجهزة المصرية-->

</select>
<select class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			<option value="">ايديال وانوسي </option>
			<option value="">كرباوي</option>
			<option value="">توشيبا</option>
			<option value="">شارب</option>
			<option value="">سيتال</option>
			<option value="">الاسكا</option>
			<option value="">يونيون اير</option>
			<option value="">كارير</option>
			<option value="">فريش</option>
			<option value="">تورنيدو</option>
			</option>

</select>

<--الاجهزة  اليابانية-->
<select  class="form-control del__" id="" name="Brands">
			<option disabled selected> اختر   الماركة</option>
			
			<option value="">بانوسينك</option>
			</option>

</select>


			<select class="form-control jop" name="jop" >
			  <!-- اكتلبي هنا الي عاوزه يظهر ياعبده عشان انا اتلغبطت اكتر  -->
			  <option disabled selected> اختر الوظيفة  </option> 
			  <!--الالررقم القومي + الموهل  -->
			  <option value="1"> فني متخصص </option> 
			  <!-- الرقم الارضي + رقم السجل التجاري + جهة اصدار السجل التجاري -->
			  <option value="2"> مركز خدمو متخصص </option> 
			  <!-- الرقم الارضي + رقم السجل التجاري + جهة اصدار السجل التجاري -->
			  <option value="3">مركز خدمة معتمد</option>
			  <!-- صورة استمارة 14 + الرقم الأرضي -->
			  <option value="4">وكيلاء تجاريون</option>
			  <!-- الرقم الارضي + رقم السجل التجاري + جهة اصدار السجل التجاري -->
			  <option value="5">وكلاء مصنعون</option>
			  
			  <!--  الالررقم القومي + الموهل  -->
			   <option class="del_ showif " value="6">فني كنترول</option>
			   <!--  الالررقم القومي + الموهل  -->
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
			<span class="input-group-text"> استمارة رقم 14 </span>
			<input type="file" class="form-control" name="formNo14">
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