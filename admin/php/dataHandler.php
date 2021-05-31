<?php
	session_start();
	require 'classes/db.php';
	require 'functions/general.php';
	
	if(isset($_POST['national_id'])){
		$result = $db_conn -> apply($_POST);
		
		if($result){
			echo "Application sent succesfully";
			die();
		}
	}
	
	if(isset($_POST['last_seen'])){
		$result = $db_conn -> report($_POST);
		
		if($result){
			echo "Details received. You will receive an alert";
		}
	}
	
	if(isset($_POST['sub_county'])){
		$result = $db_conn -> report_crime($_POST);
		
		if($result){
			echo "Thanks for reporting we are taking action immediately";
		}
	}
	
	if(isset($_POST['email']) && !empty($_POST)){
		$data = array();
		
		$email = $_POST['email'];
		$password = sha1($_POST['password']);
		$result = $db_conn -> login($email,$password);
		
		
		if(empty($result)){
			$data['success'] = 'fail';
			$data['message'] = "Wrong email and password combination";
		}
		else{
			$data['success'] = 'pass';
			$data['email'] = ($email == "admin@admin.com") ?"Admin":$email;
			$_SESSION['email'] = ($email == "admin@admin.com") ?"Admin":$email;
		}
		
		echo json_encode($data);
		die();
	}
?>