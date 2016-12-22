<?php 
session_start();

require 'vendor/autoload.php';
require 'functions.php';

use GuzzleHttp\Client; 
$client = new Client(['base_uri' => 'http://localhost:8000']);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ToDo Client</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<!-- Fontawesome -->
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<!-- Bootstrap Flatten -->
		<link rel="stylesheet" href="css/bootstrap.flatten.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="css/custom.css">
		
		<script type="text/javascript">
			function showAndroidToast(toast) {
			    android.showToast(toast);
			}
		</script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<a href="index.php">ToDo Client</a>
			<?php if (isLoggedIn()): ?>
			<a href="pages/logout.php" class="pull-right"><i class="fa fa-sign-out"></i></a>
			<?php endif; ?>
		</header>
		<div class="container-fluid">
			<?php
			$page = !empty($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php') ? $_GET['page'] : 'tasks-list';
			include 'pages/'.$page.'.php'; 
			?>
		</div>

		<!-- jQuery -->
		<script src="vendor/bootstrap/js/jquery-2.1.1.min.js"></script>
		<script src="vendor/bootstrap/js/sizzle.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Custom JavaScript -->
		<script src="js/custom.js"></script>
	</body>
</html>