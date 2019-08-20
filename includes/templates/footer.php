
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
	console.log('val');

        $.ajax({
            url: "ajax/getBrands.php",
            type: 'GET',
			data: { Brands_id: val },
            success: function (data) {
                console.log(data);
				 // document.getElementById("brndslct").innerHTML=data; 
				  $('#brndslct').append(data)

            }
        });

});
</script>
<script>
$(document).on('submit','#signup',function(e) {
	e.preventDefault();
    var data = $(this).serialize();
	
    $.ajax({
        data: data,
        type: "post",
		dataType: "json",
        url: "ajax/signup.php",
        success: function(data){
			console.log(data);
        // alert("Data: " + data);
			jQuery.each(data, function(index, item) {
				$('.errors').html('<div class="alert alert-info" role="alert">'+data[index]+'</div>')
				
			});

        },
    error: function(error){
         console.log(error.responseText);
		
    }
    });
});

</script>
	</body>
</html>