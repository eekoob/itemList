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
		<h3 class="mt-3 ml-3">Items List</h3>
	</div>

	<?php 
		if(isset($_COOKIE["countItem"]) and isset($_COOKIE["listItem"]) and $_COOKIE["countItem"]!='0') {
			$countItem = $_COOKIE["countItem"];
			$listItemsRaw = ltrim(rtrim($_COOKIE["listItem"],"_"),"_");
			$listItems = explode("_", $listItemsRaw);
			$total = 0;
			$itemNumber = 1;
			echo ('
				<form class="form-group ml-3 mr-3" action="deleteItem.php" method="post">
				  <table class="table table-striped">
				    <thead class="thead-light">
				      <tr>
				        <th scope="col">#</th>
				        <th scope="col">Item</th>
				        <th scope="col">Qty</th>
				        <th scope="col">Price</th>
				      </tr>
				    </thead>
				    <tbody>
			');
			foreach ($listItems as $key) {
				$item = explode("_", $_COOKIE[$key]);
				$itemTotal = (int)$item[1]*(int)$item[2];
				$total = $total + $itemTotal;
				// echo ($item[0] . $item[1] . $item[2] . $itemTotal . $total );
				echo ('
					<tr>
					  <th scope="row"><input class="ml-0 mr-1" type="checkbox" name="delItemList[]" aria-label="Checkbox for items" value="'.$key.'">'.$itemNumber.'</th>
					  <td>'.$item[0].'</td>
					  <td>'.(int)$item[1].'<small><small> x '.(int)$item[2].'</small></small></td>
					  <td>'.$itemTotal.'</td>
					</tr>
				');
				$itemNumber++;
			}
			echo ('
				  </tbody>
				  <thead class="thead-light">
				    <tr>
			          <th scope="row">#</th>
			          <th></th>
			          <th><i>Total</i></th>
			          <th>'.$total.'</th>
			        </tr>
				  </thead>
				  </table>
				  <div class="form-group">
				    <button class="btn btn-danger" type="submit" name="delItem" value="1">Remove Item</button>
				  </div>
				</form>
			');
			// echo ("<p>".$countItem." ".print_r($listItems, true)."</p>");
		}
	?>

	<div>


		<form class="form-group ml-3 mr-3" action="addItem.php" method="post">
			<div class="form-group">
				<label><h5>New Item :</h5></label>
				<div>
					<div class="input-group mb-2">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Item : </span>
					  </div>
					  <input class="form-control" required="true" type="text" name="itemName" placeholder="Item Name" aria-label="Item">
					</div>
					<div class="input-group mb-2">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Qty : </span>
					  </div>
					  <input class="form-control" type="number" pattern="[0-9]*" name="itemQty" placeholder="1" aria-label="Qty">
					  <div class="input-group-prepend ml-2">
					    <span class="input-group-text">Price : </span>
					  </div>
					  <input class="form-control" required="true" type="number" pattern="[0-9]*" inputmode="decimal" name="itemPrice" placeholder="Per 1" aria-label="Unit Price">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="addItem" value="1">ADD</button>
			</div>
		</form>
		<form class="form-group ml-3 mr-3" id="resetItem" action="resetItem.php" method="post">	
			<div class="form-group">
				<button class="btn btn-danger" type="submit">RESET LIST</button>
			</div>
			
		</form>
		
	</div>


</body>
</html>
