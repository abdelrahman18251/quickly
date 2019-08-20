
		<div class="footer"></div>


		 <script src="<?php echo $js ?>jquery-1.12.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<!-- <script src="<?php echo $js ?>jquery-ui.min.js"></script> -->
		<script src="<?php echo $js ?>bootstrap.min.js"></script>
		<!-- <script src="<?php echo $js ?>jquery.selectBoxIt.min.js"></script> -->
		<script src="<?php echo $js ?>front.js"></script>



		<script>





  $.validate({
    lang: 'en',
	modules : 'security'
  });


$('.types').change(function(x) {
	var val = $(this).val();
	$('.del,.del_').slideUp(0);
	
	

	if((val == 2)){
	$('.showif').show(0)
}
});
$('.jop').change(function() {
	var val = $(this).val();
	$('.del').slideUp(0);

	if((val == 1)||(val == 6)||(val == 7)){
		$('.national_ID').slideDown(0);
		$('.qualification').slideDown(0);
	}
	else if((val == 2)||(val == 3)||(val == 5)){
		$('.phone').slideDown(0);
		$('.Commercial_Registration').slideDown(0);
		$('.Issuer').slideDown(0);
	}
	else if(val == 4){
		$('.formNo14').slideDown(0);
	}
});


$('.Brands').change(function() {
	var val = $(this).val();
	//console.log('val');

        $.ajax({
            url: "ajax/getBrands.php",
            type: 'GET',
			data: { Brands_id: val },
            success: function (data) {
                //console.log(data);
				 // document.getElementById("brndslct").innerHTML=data; 
				  $('#brndslct').append(data)

            }
        });

});
</script>
<script>
$(document).on('submit','#signup',function(e) {
	var username = ($('#username').val() || null);

	var name = ($('#name').val()|| null);
	var password = ($('#password').val() );
	var password2 = ($('#password2').val());
	var email = ($('#email').val() || null);
	var governorate = ($('#governorate').val() || null);
	var address = ($('#address').val() || null);
	var mobile = ($('#mobile').val() || null);
	var types = ($('#types').val() || null);
	var brands = ($('#brands').val() || null);
	var brand = ($('#brand').val() || null);
	var jop = ($('#jop').val() || null);
	var national_ID = ($('#national_ID').val() || null);
	var edu = ($('#edu').val() || null);
	var phone = ($('#phone').val() || null);
	var Commercial_Registration = ($('#Commercial_Registration').val() || null);
	var Issuer = ($('#Issuer').val() || null);
	var formNo14 = ($('#formNo14').val() || null);

	e.preventDefault();
    var serialize = $(this).serialize();
	//console.log(serialize);
	//alert(username)

    $.ajax({
        data : {
			 username : username,
			 name : name,
			 password : password,
			 password2 : password2,
			 email : email,
			 governorate : governorate,
			 address : address,
			 mobile : mobile,
			 types : types,
			 brands : brands,
			 brand : brand,
			 jop : jop,
			 national_ID : national_ID,
			 edu : edu,
			 phone : phone,
			 edu : edu,
			 Commercial_Registration : Commercial_Registration,
			 Issuer : Issuer,
			 formNo14 : formNo14,},
        type: "post",
		dataType: "json",
        url: "ajax/signup.php",
        success: function(data){
			//console.log(data);
        // alert("Data: " + data);
			jQuery.each(data, function(index, item) {
				$('.errors').html('<div class="alert alert-info" role="alert">'+data[index]+'</div>')
				if(data[index] == 'Records added successfully.'){
					alert('تم الاضافة بنجاح');
					localStorage.setItem('username', username);
					localStorage.setItem('password', password);
					location.reload();
					

				}
			});

        },
    error: function(error){
         alert('عفواً حدث خطأ . تأكد من البيانات ثم عاود المحاولة');
		
    }
    });
});

 $('#LoginUsername').val(localStorage.getItem('username'))
 $('#LoginPassword').val(localStorage.getItem('password'))
</script>
	</body>
</html>