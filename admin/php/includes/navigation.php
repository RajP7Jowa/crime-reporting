<?php $current = basename($_SERVER['SCRIPT_NAME']);?>

<ul>
	<li <?php if($current == 'index.php') echo 'class="active"'?>><a href="index.php">Home</a><span></li>
	<li <?php if($current == 'apply.php') echo 'class="active"'?>><a href="apply.php">Apply</a><span></li>
	<li <?php if($current == 'report.php') echo 'class="active"'?>><a href="report.php">Report</a><span></li>
	<li <?php if($current == 'alerts.php') echo 'class="active"'?>><a href="alerts.php">Alerts</a><span> </li>	
	
	<li><a href="logout.php">Logout</a></li>
</ul>