<!Doctype html>
<?php
	require 'php/init.php';
	
	$title = basename($_SERVER['SCRIPT_NAME']);
	$title = str_ireplace('.php', '', $title);
	
	ucfirst($title);
	
	if($title == 'index')
		$title = 'Home';
?>
<html>
	<head>
		<title><?php echo $title ?></title>
		 
	 	<link href="assets/css/font-awesome.css" rel="stylesheet" media="screen">
     	<link href="assets/css/my_style.css" rel="stylesheet" media="screen">
	 	<link href="assets/css/print.css" rel="stylesheet" media="print">
	 	<link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet"/>
	 	<link type="text/css" href="assets/css/bootswatch.css" rel="stylesheet"/>
		<link type="text/css" href="assets/css/stylesheet.css" rel="stylesheet"/>
		
		<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		<script type="text/javascript" src="assets/js/validator.js"></script>
		<script>
		$(function(){
		// highlight
			var elements = $("input[type!='submit'], textarea, select");
			
			elements.focus(function(){
				$(this).parents('li').addClass('highlight');
			});
			
			elements.blur(function(){
				$(this).parents('li').removeClass('highlight');
			});

			
			$("#password").removeClass("required");
			$("#login_form").submit();
			$("#password").addClass("required");
			return false;
			});

			$("#login_form").validate();
		});
	</script>
	</head>
	<body>