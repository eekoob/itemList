<!DOCTYPE html>
<html>
<head>
	<title>Item List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="apple-touch-icon" href="favicon.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
</head>
<body>
	<div>
		<h3 class="mt-3 ml-3">Reset List</h3>
	</div>
	<div>
		<div id="result"></div>

		<form class="form-group ml-3 mr-3" action="resetItem.php" method="post">
			<div class="alert alert-danger">
  				<strong>Reset the list?</strong><br> This will clear all items in your current list.
			</div>	
			<div class="form-group">
				<button class="btn btn-danger" type="submit" name="resetItem" value="1">CLEAR ALL</button>
			</div>
			<div class="form-group">
				<button class="btn btn-secondary" type="submit" name="cancelResetItem" value="1">CANCEL</button>
			</div>
		</form>	
	</div>
</body>
</html>

<?php
	// echo print_r($_POST);
	if ((isset($_POST['cancelResetItem']) and $_POST['cancelResetItem']=='1')) {
		header('location: itemList.php');
	}
	else if (isset($_POST['resetItem']) and $_POST['resetItem']=='1') {
		
		foreach ($_COOKIE as $key => $value) {
			echo($key . " " . $value . "<br>");
			setcookie($key, "", time() - 3600, "/");
		}
		echo ($key);
		header('location: itemList.php');
	}
?>