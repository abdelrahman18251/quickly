<?php
	
	// Error Reporting

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

    include '../admin/connect.php';
    
    include '../includes/functions/functions.php';
	
   // include '../init.php';
        $Brands_id = $_GET['Brands_id'];

        //echo $Brands_id;
	      	$allCats = getmanufactureCountrys($Brands_id);
			foreach ($allCats as $cat) {
                echo '<option value="'.$cat['id'].'"> ' . $cat['name'] . '  </option>';
                //echo json_encode($cat);
			}
	      ?>