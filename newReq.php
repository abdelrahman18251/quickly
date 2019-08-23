<?php
ob_start();
// session_start();
$pageTitle = 'Login';
include 'init.php';

?>


<div class="container">


  <h2>Form control: input</h2>
  <p>The form below contains two input elements; one of type text and one of type password:</p>
  <form class="users" id="users" novalidate>
		<div class="input-container">

	
		<div class="input-group">
			<span class="input-group-text">name</span>
			<input type="text" class="form-control" id="name" name="name" data-validation="required">
		</div>

		<div class="input-group">
			<span class="input-group-text">Governorate</span>
			<select class="form-control " name="governorate" required="" id="governorate">
						<option value="" selected disabled="disabled"> اختر المحافظة</option>
						<?php
						$allCats = getAllFrom("*", "categories", "where 1", "", "ID", "ASC");
						foreach ($allCats as $cat) {
							echo '<option data-value="'.$cat['ID'].'" value="'.$cat['ID'].'"> ' . $cat['Name'] . '  </option>';
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

		<div class="input-group phone">
					<span class="input-group-text">  الرقم الارضي ان وجد</span>
					<input type="text" class="form-control" name="phone" id="phone" maxlength="11">
		</div>
		<div class="input-group">
		<span class="input-group-text">types</span>
			<select class="form-control types" name="types" required="" id="types">
				<option data-value="" value="" disabled="disabled" selected>اختر طبيعة العمل </option>
				<option data-value="1" value="أجهزة منزلية">أجهزة منزلية</option>
				<option data-value="2" value="تكييف مركزى">تكييف مركزى</option>
			</select>
		<div>



			<div class="input-group">
			<span class="input-group-text">types</span>
				<select  class="form-control Brands" name="brands" required="" id="brands">
						<option  value="" disabled="disabled" selected> اختر  نوع الماركة</option>
						<?php
						$allCats = getAllBrands();
						foreach ($allCats as $cat) {
							echo '<option data-value="'.$cat['id'].'" value="' . $cat['Brandsname'] . '"> ' . $cat['Brandsname'] . '  </option>';
						}
					?>
				</select>
			</div>


			<div class="input-group">
			<span class="input-group-text brand">type</span>
				<select  class="form-control " id="brand"  name="brand" required="">
					<option  disabled="disabled" selected>اختر النوع</option>
				</select>
			</div>
			
			<div class="form-group">
			<label for="comment">العيب الظاهر:</label>
			<textarea class="form-control" rows="5" id="defect" name="defect"></textarea>
			</div>
		<input class="btn btn-success btn-block" name="signup" type="submit" value="Signup" />
	</form>
</div>
<?php
	include $tpl . 'footer.php'; 
	ob_end_flush();
?>