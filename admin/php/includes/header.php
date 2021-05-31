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
		 
	 	<link href="libraries/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
     	<link href="libraries/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	 	<link href="libraries/bootstrap/css/print.css" rel="stylesheet" media="print">
	 	<link type="text/css" href="libraries/css/bootstrap.css" rel="stylesheet"/>
	 	<link type="text/css" href="libraries/css/bootswatch.css" rel="stylesheet"/>
		
		
		<link rel="stylesheet" href="stylesheet/style.css"/>
		<!-- <script type="text/javascript" src="libraries/jquery/jquery-2.js"></script> -->
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="libraries/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="libraries/jquery/jquery.validate.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/validator.js"></script>
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