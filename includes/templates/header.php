<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php getTitle() ?></title>
		<link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo $css ?>font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo $css ?>jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo $css ?>jquery.selectBoxIt.css" />
		<link rel="stylesheet" href="<?php echo $css ?>front.css" />
	</head>
	<body>
	<div class="upper-bar">
		<div class="container">
			<?php 
				if (isset($_SESSION['user'])) { ?>

				<div class="float-left">
				<img class="my-image img-thumbnail img-circle" src="img.png" alt="" />
				<div class="btn-group my-info">
					<span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $sessionUser ?>
						<span class="caret"></span>
					</span>
					<ul class="dropdown-menu">
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="newad.php">New Item</a></li>
						<li><a href="profile.php#my-ads">My Items</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				</div>

				

</div>		
</div>
	</div>
	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button 
	      		type="button" 
	      		class="navbar-toggle collapsed" 
	      		data-toggle="collapse" 
	      		data-target="#app-nav" 
	      		aria-expanded="false">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">quickly</a>
	
	    </div>
	    <div class="collapse navbar-collapse" id="app-nav">
	      <ul class="nav navbar-nav navbar-right">
		  
		  <a class="navbar-brand" href="#"><i class="fa fa-bell" aria-hidden="true"></i>  <span class="label label-danger" id="not_count"></span>  <?php  ?> </a>
		  <?php
		  
		  $GovernorateID=$_SESSION['GovernorateID'];
	      	$allCats = getAllFrom("*", "categories", "where ID = {$GovernorateID}", "", "ID", "ASC");
			foreach ($allCats as $cat) {
				//$cat['Name'] =$_SESSION['GovernorateName'];
				echo 
				'<li>
					<a href="index.php">
						' . $cat['Name'] . '
					</a>
				</li>';
			}
	      ?>
	      </ul>
	    </div>
	  </div>

	  <audio id="Audio">
		<source src="chimes-glassy.ogg" type="audio/ogg">
		<source src="chimes-glassy.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	  </audio>

	</nav>
	<?php

				} else {
			?>
			<a href="login.php">
				<span class="pull-right">Login/Signup</span>
			</a>
			<?php } ?>