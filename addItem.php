<?php 
	if (isset($_POST['addItem'])) {
		echo print_r($_POST);
		$itemName = $itemQty = $itemPrice = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$itemName = test_input($_POST["itemName"]);
			$itemQty = test_input($_POST["itemQty"]);
			$itemPrice = test_input($_POST["itemPrice"]);
		}

		if(!isset($_COOKIE["countItem"])) {
			setcookie("countItem", "0", time() + 86400 , "/" );
			setcookie("listItem", "", time() + 86400 , "/" );
			setcookie("currentItemId", "0", time() + 86400 , "/" );
		} 

		
		$cookie_currentCountItem = (int)$_COOKIE["countItem"]+1;
		$cookie_currentItemId = (int)$_COOKIE["currentItemId"]+1;
		$cookie_value = $itemName."_".$itemQty."_".$itemPrice;
		setcookie($cookie_currentItemId, $cookie_value, time() + 86400 , "/" );
		setcookie("countItem", $cookie_currentCountItem, time() + 86400 , "/" );
		setcookie("listItem", $_COOKIE["listItem"].$cookie_currentItemId.'_', time() + 86400 , "/" );
		setcookie("currentItemId", $cookie_currentItemId, time() + 86400 , "/" );
	}
	header('location: itemList.php');

	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
		}

 ?>