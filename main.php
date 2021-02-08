
<!DOCTYPE html>
<html>
<head>
	<title>Compare Price</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		// define variables and set to empty values
		$amount1 = $price1 = $amount2 = $price2 = "";
		$amountPerBaht1 = $amountPerBath2 = 0;
		$status1 = $status2 = "Please Enter Valid Number";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$amount1 = test_input($_POST["amount1"]);
			$price1 = test_input($_POST["price1"]);
			$amount2 = test_input($_POST["amount2"]);
			$price2 = test_input($_POST["price2"]);
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$amountPerBaht1 = $amount1/$price1;
		$amountPerBaht2 = $amount2/$price2;
		if ($amountPerBaht1 > $amountPerBaht2) {
			$status1 = "CHEAP";
			$status2 = "EXPENSIVE";
		} elseif ($amountPerBaht1 < $amountPerBaht2) {
			$status1 = "EXPENSIVE";
			$status2 = "CHEAP";
		} elseif ($amountPerBaht1 == $amountPerBaht2) {
			$status1 = "Same price";
			$status2 = "Same price";
		}	
	?>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item" role="presentation">
	    <a class="nav-link" id="items-tab" data-bs-toggle="tab" href="itemList.php" role="tab" aria-controls="nav-item" aria-selected="true">Items</a>
	  </li>
	  <li class="nav-item" role="presentation">
	    <a class="nav-link active" id="compare-tab" data-bs-toggle="tab" href="compare.html" role="tab" aria-controls="nav-compare" aria-selected="false">Compare</a>
	  </li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="nav-compare" role="tabpanel" aria-labelledby="compare-tab">
		<div>
			<h2 class="mt-3 ml-3">Compare Items Prices</h2>
		</div>
		<div>
			<form class="form-group ml-3 mr-3">
				<div class="form-group">
					<label><h4>ITEM 1</h4></label>
					<div>
						<div class="input-group mb-2">
						  <div class="input-group-prepend">
						    <span class="input-group-text" style="	<?php 
						  												if ($status1=="CHEAP") {
						  													echo "background-color: palegreen; font-weight: bold;";
						  												} elseif ($status1=="EXPENSIVE") {
						  													echo "background-color: mistyrose; font-weight: bold;";
						  												} elseif ($status1=="Same price") {
						  													echo "background-color: lemonchiffon; font-weight: bold;";
						  												}
						  											?>">
						    	<?php echo $status1; ?>
						    </span>
						  </div>
						</div>
						<div class="input-group mb-5">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Amount per 1฿ : &nbsp <b><?php echo round($amountPerBaht1,2); ?></b></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label><h4>ITEM 2</h4></label>
					<div>
						<div class="input-group mb-2">
						  <div class="input-group-prepend">
						    <span class="input-group-text" style="	<?php 
						  												if ($status2=="CHEAP") {
						  													echo "background-color: palegreen; font-weight: bold;";
						  												} elseif ($status2=="EXPENSIVE") {
						  													echo "background-color: mistyrose; font-weight: bold;";
						  												} elseif ($status2=="Same price") {
						  													echo "background-color: lemonchiffon; font-weight: bold;";
						  												}
						  											?>">
						    	<?php echo $status2; ?>
						    </span>
						  </div>
						</div>
						<div class="input-group mb-5">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Amount per 1฿ :  &nbsp <b><?php echo round($amountPerBaht2,2); ?></b></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<a href="compare.html">
						<button class="btn btn-danger" type="button">RESET</button>
					</a>
				</div>
			</form>
		</div>
	  </div>
	</div>
</body>
</html>

