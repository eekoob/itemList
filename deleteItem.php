<?php
	if (isset($_POST['delItemList']) and isset($_POST['delItem']) and $_POST['delItem']=='1') {
		$listItemsRaw = rtrim($_COOKIE["listItem"],"_");
		$listItems = explode("_", $listItemsRaw);
		$newListItems = implode("_", array_diff($listItems,$_POST["delItemList"]))."_";
		$newCountItem = (int)$_COOKIE["countItem"];
		// echo print_r($_POST["delItemList"],true)."<br>";
		// echo print_r($listItems, true)."<br>";
		// echo $newListItems."<br>";
		// $result=array_diff($listItems,$_POST["delItemList"]);
		setcookie("listItem", $newListItems, time() + 86400*30 , "/" );
		
		foreach ($_POST["delItemList"] as $index => $itemId) {
			// Remove item from list in cookie
			setcookie($itemId, "", time() - 3600, "/");
			// countItem-- in cookie
			$newCountItem = $newCountItem - 1; 
		}
		setcookie("countItem", $newCountItem, time() + 86400*30 , "/" );
		// echo $_COOKIE["listItem"]."<br>";
	}

	header('location: itemList.php');
?>