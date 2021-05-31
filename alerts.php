<?php
include 'php/includes/header.php';

if (!isset($_SESSION['email'])) {
	Header('Location:logout.php');
}


?>
<div class="container" id="wrapper">
	<div id="header">
		<div class="mainLogo">
			<div class="logo"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
		</div>
		<div id="login">
			<?php if (isset($_SESSION['email'])) { ?>
				You are logged in as: <b><?php echo $_SESSION['email']; ?></b>
			<?php } else { ?>
				<a href="login.php">Login</a> | <a href="register.php">Register</a>
			<?php } ?>
		</div>
	</div>
	<div id="nav">
		<?php include 'php/includes/navigation.php' ?>
	</div>
	<div id="main">
		<div class="row">
			<div class="col-sm-3" id="side_menu3">
				<ul id="side_menu">
					<li id="r_crime"><a href="">Missing Person List</a></li>
					<li><a href="" id="persons">Found Person List </a></li>
					<li id="r_crime"><a href="">Missing Vehicles List</a></li>
					<li><a href="" id="persons">Found Vehicles List </a></li>
					<li id="lost-found"><a href="">Lost Items List</a></li>
					<li id="lost-found"><a href="">Found Items List</a></li>
					<li id="lost-found"><a href="">Wanted Criminals</a></li>
					<li id="lost-found"><a href="">Security Alerts</a></li>
				</ul>

			</div>
			<div class="col-sm-2"></div>

			<div class="col-sm-9">
				<iframe src="alertframe.php" height="415px" width="100%" style="border:1px solid #aaa;">

				</iframe>
			</div>

		</div>
		<div class="clearer" style="height:8px;"></div>
		<?php include 'php/includes/footer.php'; ?>