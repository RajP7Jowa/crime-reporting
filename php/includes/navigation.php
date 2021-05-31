<?php 

$current = basename($_SERVER['SCRIPT_NAME']);

?>

<div id="navcontainer">
	<ul id="navlist">
		<li <?php if($current == 'index.php') echo 'class="active"'?>><a href="index.php">HOME</a><span></li>
		<li <?php if($current == 'report.php') echo 'class="active"'?>><a href="report.php">REPORT CRIME</a><span></li>		
		<li <?php if($current == 'alerts.php') echo 'class="active"'?>><a href="alerts.php">ALERTS</a><span> </li>
		<li <?php if($current == 'apply.php') echo 'class="active"'?>><a href="apply.php">APPLY</a><span></li>		
		
		<li style="float:right;<?php if(!isset($_SESSION['email'])) echo 'display:none;';?>"  > <a href="logout.php"><small>Logout[<?php echo $_SESSION['email']; ?>]</small></a></li>
	</ul>
</div>