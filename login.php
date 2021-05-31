<?php
include 'php/includes/header.php';


?>


<?php
//require 'php/init.php';

$title = basename($_SERVER['SCRIPT_NAME']);
$title = str_ireplace('.php', '', $title);

ucfirst($title);

if ($title == 'index')
	$title = 'Home';
?>
<html>

<head>

	<title><?php echo $title; ?></title>

	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link href="libraries/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
	<link href="libraries/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	<link href="libraries/bootstrap/css/print.css" rel="stylesheet" media="print">
	<link type="text/css" href="libraries/css/bootstrap.css" rel="stylesheet" />
	<link type="text/css" href="libraries/css/bootswatch.css" rel="stylesheet" />
	<!-- <link href="css/screen.css" rel="stylesheet" media="screen"> -->


	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/validator.js"></script>

	<script type="text/javascript">
		$(function() {
			// highlight
			var elements = $("input[type!='submit'], textarea, select");
			elements.focus(function() {
				$(this).parents('li').addClass('highlight');
			});
			elements.blur(function() {
				$(this).parents('li').removeClass('highlight');
			});

			$("#forgotpassword").click(function() {
				$("#password").removeClass("required");
				$("#loginform").submit();
				$("#password").addClass("required");
				return false;
			});

			$("#loginform").validate();

			$('#loginform').submit(function(e) {
				e.preventDefault();


				var isValid = $('#loginform').valid();

				if (isValid) {
					var data = $('#loginform').serialize();

					$.post('php/dataHandler.php', data, function(data2) {

						var feedBack = JSON.parse(data2);

						var success = String(feedBack.success);

						if (success == 'pass') {
							$('#loginform').each(function() {
								this.reset();
							});

							var email = String(feedBack.email);

							if (email == 'Admin') {
								location.replace('redirect.php');
							} else {
								location.replace('index.php');
							}
						} else if (success == 'fail') {
							$('#error_message').html('<div style="background-color:#FFE0FF; padding:5px 10px;border-radius:5px;font-family:Verdana; border:2px solid #FFC2FF;">Wrong email and password combination.Try again</div>');
							$('#password').val("");
						}

					});


				}

				return false;
			});
		});
	</script>
	<style type="text/css">
		.right-side {
			padding:0px;
			background-size: cover;
		}

		.right-side h3 {
			font-size: 30px;
			font-weight: 700;
			color: #000;
			padding: 50px 10px 00px 50px;
		}

		.right-side p {
			font-weight: 600;
			color: #000;
			padding: 10px 50px 10px 50px;
		}

		.form {
			padding: 10px 50px;;
		}

		.form-control {
			box-shadow: none !important;
			border-radius: 0px !important;
			border-bottom: 1px solid #2196f3 !important;
			border-top: 1px !important;
			border-left: none !important;
			border-right: none !important;
			padding-left: 19px;
		}

		.btn-deep-purple {
			background: #2196f3;
			border-radius: 18px;
			padding: 5px 19px;
			color: #FFF;
			font-weight: 600;
			float: right;
			-webkit-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.24);
			-moz-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.24);
			box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.24);
		}

		.form-group {
			margin-bottom: 20px;
		}

		#forgotpassword:hover {
			text-decoration: none;
		}

		.error {
			color: red;
			padding: 5px 0px;
		}
	</style>
</head>

<body>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="logo" style="margin-top:-40px;margin-bottom:8px;"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
		</div>
		<div style="clear:both;"></div>
		<div id="nav">
			<?php include 'php/includes/navigation.php' ?>
		</div>
		<div id="main">
			<div class="row">

				<div class="container">

					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-3">
						</div>
						<!--col-sm-6-->

						<div class="col-md-6 right-side">
							<h3><img src="assets/images/lockscreen.png"> &nbsp; <span style="margin-bottom:20px; position:relative;">Login</span></h3>
							<div class="clearfix" style="padding-top: 20px;"></div>

							<!--Form with header-->
							<div class="row">
								<form class="form" method="post" id="loginform">
									<ul type="none" style="padding-left: 0px;">
										<li id="error_message"></li>
									</ul>

									<div class="form-group">
										<label for="email">Your e-mail</label>
										<input id="email" name="email" type="text" class="form-control input-md text required email">
										<label for="email" class="error" style="display:none;">This must be a valid email address</label>
									</div>

									<div class="form-group">
										<label for="password">Your password</label>
										<input name="password" type="password" id="password" class="form-control input-md text required" minlength="4" maxlength="20">

									</div>
									<div class="form-group" style="padding-top: 20px; padding-bottom:50px">

										<div class="text-xs-center">
											<button class="btn btn-deep-purple">Login</button>
										</div>

										<label class="centered info"><a id="forgotpassword" href="#" style="margin-top:10px;font-family: trebuchet ms;font-size: 13px;font-weight:normal;">Forgot password</a>
										</label>
									</div>
								</form>
							</div>
							<!--/Form with header-->

						</div>
						<!--col-sm-6-->


					</div>
					<!--col-sm-8-->

				</div>
				<!--container-->

			</div>


		</div>

		<?php include 'php/includes/footer.php'; ?>