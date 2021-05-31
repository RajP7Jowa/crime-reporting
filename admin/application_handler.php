<?php
	require 'php/init.php';

	if(isset($_POST['grant'])){
		$id_number = $_POST['id_number'];
		
		$result = $db_conn -> aplicationHandler($id_number);
		
		if($result){
			//email
			header('Location:success.php');
		}
	
	}
	
	if(isset($_POST['deny'])){
		header('Location:index.php');
	}
	
	if(isset($_POST['alert'])){
		$number = $_POST['number_plate'];
		$result = $db_conn -> updateAlert($number);
		
		if($result){
			header('Location:success2.php');
		}
		else{
			echo "Not succesfull";
			die();
		}
	}
	
	if(isset($_POST['walert'])){
		$number_plate = $_POST['number_plate'];
		$result = $db_conn -> removeAlert($number_plate);
		
		if($result){
			header('Location:success2.php?s=found');
		}
		
	}
	
	if(isset($_POST['alertPerson'])){
		$name = $_POST['person'];
		$result = $db_conn -> postAlert($name);
		
		if($result){
			header('Location:success2.php');
		}
		
	}
	
	if(isset($_POST['personFound'])){
		$person = $_POST['person'];
		$result = $db_conn -> removeAlert2($person);
		
		if($result){
			header('Location:success2.php');
		}
		
	}
	
	

?>