<?php 
	session_start();
	include 'init.php';
	$Gov = $_SESSION['GovernorateID'];

?>

<div class="container">
	<h1 class="text-center">العناصر المتاحة في محافظة  </h1>
	<div class="row">
		<?php
		if (isset($_GET['pageid']) && is_numeric($_GET['pageid'])) {
			$category = intval($_GET['pageid']);
			
			$allItems = getAllFrom("*", "items", "where Cat_ID = {$category}", "AND Approve = 1", "Item_ID");
				foreach ($allItems as $item) {
				echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail item-box">';
						echo '<span class="price-tag">' . $item['Price'] . '</span>';
						echo '<img class="img-responsive" src="img.png" alt="" />';
						echo '<div class="caption">';
							echo '<h3 class="bw"><a href="items.php?itemid='. $item['Item_ID'] .'">' . $item['Name'] .'</a></h3>';
							echo '<p class="bw">' . $item['Description'] . '</p>';
							echo '<div class="date">' . $item['Add_Date'] . '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		} else {
			echo 'You Must Add Page ID';
		}
		?>
	</div>
</div>

<?php include $tpl . 'footer.php'; ?>