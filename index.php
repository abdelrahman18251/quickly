<?php
	ob_start();
	session_start();
	$pageTitle = 'Homepage';
	include 'init.php';
	
?>
<div class="container">
	<div class="row"><br>
	<?php 
				if (isset($_SESSION['user'])) { ?>
		<?php
			//$allItems = getAllFrom('*', 'items', 'where Approve = 1', '', 'Item_ID');

			$Gov = $_SESSION['GovernorateID'];
			
			$allItems = getAllFrom("*", "items", "where Cat_ID = {$Gov}", "AND Approve = 1", "Item_ID");


			foreach ($allItems as $item) {
				
				echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail item-box">';
						echo '<span class="price-tag">EGP ' . $item['Price'] . '</span>';
						echo '<img class="img-responsive" src="img.png" alt="" />';
						echo '<div class="caption" >';
							echo '<h3 overflow-wrap: break-word;><a href="items.php?itemid='. $item['Item_ID'] .'">' . $item['Name'] .'</a></h3>';
							echo '<p style="overflow-wrap: break-word;">' . $item['Description'] . '</p><br>';
							echo '<div class="date">' . $item['Add_Date'] . '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}

			
		?>
		<?php 
				} ?>
	</div>
</div>
<?php
	include $tpl . 'footer.php'; 
	ob_end_flush();
?>