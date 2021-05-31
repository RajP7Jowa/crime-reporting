<?php 
	include 'php/includes/header.php'; 
	
	 if(!isset($_SESSION['email'])){
		Header('Location:logout.php');
	}


?>
<h3 style="margin-top:-50px;">Missing Vehicles</h3>
				<style type="text/css">
					table th{
						padding:10px;
						font-family:trebuchet ms;
						color:#fff;
						background:#1B1B1B;
						text-align:center;
					}
					
					table tr td{
						border:1px solid #090909;
						padding:10px;
						font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
						color:#000000;
					}
					
					table tr td.carry-up{
						height:80px;
					}
				</style>
				<table style="width:100%;">
					<?php
					echo '<tr style="border:1px solid #000;">';
					echo '<th><b>Model</b></th>';
					echo '<th><b>Number plate</b></th>';
					echo '<th><b>Image</b></th>';
					echo '<th><b>Description</b></th>';
					echo '<th><b>Phone Number</b></th>';
					echo '<th><b>Action</b></th>';
					echo '</tr>';
						$db_conn -> getAlerts1();
					?>
				</table>
				<h3>Missing Persons</h3>
				<table>
					<?php
					echo '<tr style="1px solid #000">';
					echo '<td><b>Status</b></td>';
					echo '<td><b>Full Names</b></td>';
					echo '<td><b>Address</b></td>';
					echo '<td><b>Image</b></td>';
					echo '<td><b>Description</b></td>';
					echo '<td><b>Phone Number</b></td>';
					echo '<td><b>Action</b></td>';
					echo '</tr>';
						$db_conn -> getAlerts2();
					?>
				</table>
				</div>	