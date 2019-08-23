<?php
	ob_start();
	session_start();
	$pageTitle = 'Homepage';
	include 'init.php';
	
?>
<?php if (isset($_SESSION['user'])) { ?>
<div class="container">
	<div class="row"><br>

	


		<?php
			//$allItems = getAllFrom('*', 'items', 'where Approve = 1', '', 'Item_ID');

			$Gov = $_SESSION['GovernorateID'];
			
			$allItems = getAllFrom("*", "items", "where Cat_ID = {$Gov}", "AND Approve = 1 AND Status = 1", "Item_ID");


			foreach ($allItems as $item) {
				
				// echo '<div class="col-sm-6 col-md-3">';
				// 	echo '<div class="thumbnail item-box">';
				// 		echo '<span class="price-tag">EGP ' . $item['Price'] . '</span>';
				// 		echo '<img class="img-responsive" src="img.png" alt="" />';
				// 		echo '<div class="caption" >';
				// 			echo '<h3 overflow-wrap: break-word;><a href="items.php?itemid='. $item['Item_ID'] .'">' . $item['Name'] .'</a></h3>';
				// 			echo '<p style="overflow-wrap: break-word;">' . $item['Description'] . '</p><br>';
				// 			echo '<div class="date">' . $item['Add_Date'] . '</div>';
				// 		echo '</div>';
				// 	echo '</div>';
				// echo '</div>';

				echo '<form><div class="col-sm-6 col-md-3">';
				echo '<div class="panel panel-default ">';
				echo '<div class="panel-heading">' . $item['Name'] . '</div>';
				echo '<div class="panel-body"> ';
				echo '' . mb_strimwidth($item['defect'],0,100,"...") . '';
				echo '<a href="items.php?itemid='. $item['Item_ID'] .'">see more</a>';
				echo ' <p class="text-muted text-right">' . $item['Add_Date'] . '</p><div class="text-center"> ';
				echo '<button type="button" class="btn btn-success" value="'. $item['Item_ID'] .'">قبول</button>';
				echo '<button type="button" class="btn btn-danger" value="'. $item['Item_ID'] .'">رفض</button>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div></form>';

			}

			
		?>




		
	</div>

</div>
<?php } else{?>



<h1>لاضافة طلب جديد </h1>
<a href="newReq.php">اضغط هنا</a>


<?php } ?>

<?php
	include $tpl . 'footer.php'; 
	ob_end_flush();
?>