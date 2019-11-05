<?php 
	if (isset($_POST['addItem'])) {
		// echo print_r($_POST);
		// echo print_r($_POST["itemQty"]);
		$itemName = $itemQty = $itemPrice = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$itemName = test_input($_POST["itemName"]);
			if ($_POST["itemQty"]==="") {
				$itemQty = 1;
			}
			else {
				$itemQty = test_input($_POST["itemQty"]);
			}
			$itemPrice = test_input($_POST["itemPrice"]);
		}

		if(!isset($_COOKIE["countItem"])) {
			setcookie("countItem", "0", time() + 86400*30 , "/" );
			setcookie("listItem", "", time() + 86400*30 , "/" );
			setcookie("currentItemId", "0", time() + 86400*30 , "/" );

			$cookie_currentCountItem = 1;
			$cookie_currentItemId = 1;
			$cookie_value = $itemName."_".$itemQty."_".$itemPrice;
			setcookie($cookie_currentItemId, $cookie_value, time() + 86400*30 , "/" );
			setcookie("countItem", $cookie_currentCountItem, time() + 86400*30 , "/" );
			setcookie("listItem", $cookie_currentItemId.'_', time() + 86400*30 , "/" );
			setcookie("currentItemId", $cookie_currentItemId, time() + 86400*30 , "/" );
		} 
		else {
			$cookie_currentCountItem = (int)$_COOKIE["countItem"]+1;
			$cookie_currentItemId = (int)$_COOKIE["currentItemId"]+1;
			$cookie_value = $itemName."_".$itemQty."_".$itemPrice;
			setcookie($cookie_currentItemId, $cookie_value, time() + 86400*30 , "/" );
			setcookie("countItem", $cookie_currentCountItem, time() + 86400*30 , "/" );
			setcookie("listItem", $_COOKIE["listItem"].$cookie_currentItemId.'_', time() + 86400*30 , "/" );
			setcookie("currentItemId", $cookie_currentItemId, time() + 86400*30 , "/" );
		}
		
	}
	header('location: itemList.php');

	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
		}

 ?>