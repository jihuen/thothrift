<?php
	ob_start(); // Start output buffering

	include("function/session.php");
	include("db/dbconn.php");
	include ("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>THO THRIFT</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'announcement.html'; ?>
	<?php include 'navbar.php'; ?>
	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">My Account</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = $conn->query("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
								$fetch = $query->fetch_array();
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo htmlspecialchars($fetch['firstname'] ?? '');?>&nbsp;<?php echo htmlspecialchars($fetch['mi'] ?? '');?>&nbsp;<?php echo htmlspecialchars($fetch['lastname'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo htmlspecialchars($fetch['address'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo htmlspecialchars($fetch['country'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">ZIP Code:</td><td class="profile"><?php echo htmlspecialchars($fetch['zipcode'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo htmlspecialchars($fetch['mobile'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">Telephone Number:</td><td class="profile"><?php echo htmlspecialchars($fetch['telephone'] ?? '');?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo htmlspecialchars($fetch['email'] ?? '');?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>



	<br>

	<form method="post" class="well" style="background-color:#fff;">
	<table class="table">
	<label style="font-size:25px;">My Cart</label>
		<tr>
			<th><h3>Image</h3></td>
			<th><h3>Product Name</h3></th>
			<th><h3>Size</h3></th>
			<th><h3>Quantity</h3></th>
			<th><h3>Price</h3></th>
			<th><h3>Add</h3></th>
			<th><h3>Remove</h3></th>
			<th><h3>Subtotal</h3></th>
		</tr>

<?php


	if (isset($_GET['id']))
	$id=$_GET['id'];
	else
	$id=1;
	if (isset($_GET['action']))
	$action=$_GET['action'];
	else
	$action="empty";

	switch($action)
	{

		case "view":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id];
		break;
		case "add":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id]++;
			else
			$_SESSION['cart'][$id]=1;
		break;
		case "remove":
			if (isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]--;
				if ($_SESSION['cart'][$id]==0)
				unset($_SESSION['cart'][$id]);
			}
		break;
		case "empty":
			unset($_SESSION['cart']);
		break;
	}
if (isset($_SESSION['cart']))
	{

	$total=0;
	foreach($_SESSION['cart'] as $id => $x)
	{
	$result=$conn->query("Select * from product where product_id=$id");
	$myrow=$result->fetch_array();
	$name=$myrow['product_name'];
	$name=substr($name,0,40);
	$price=$myrow['product_price'];
	$image=$myrow['product_image'];
	$product_size=$myrow['product_size'];
	$line_cost=$price*$x;
	$total=$total+$line_cost;


		echo "<tr class='table'>";
		echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
		echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
		echo "<td><h4>".$product_size."</h4></td>";
		echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
		echo "<td><h4>".$price."</h4></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></td>";
		echo "<td><strong><h3>RM ".$line_cost."</h3></strong>";
		echo "</tr>";
		}

		echo"<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td><h2>TOTAL:</h2></td>";
		echo "<td><strong><input type='hidden' value='".$total."' required name='total'><h2 class='text-danger'>RM ".$total."</h2></strong></td>";
		echo "<td></td>";
		echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i> Empty cart</a></td>";
		echo "</tr>";
	}
 	else
		echo "<font color='#111' class='alert alert-error' style='float:right'>Cart is empty</font>";

?>
	</table>


	<div class='pull-right'>
            <a href='home.php' class='btn btn-inverse btn-lg'>Continue Shopping</a>
            <?php echo "<button type='button' class='btn btn-inverse btn-lg' data-toggle='modal' data-target='#confirmPurchaseModal'>Purchase</button>"; ?>


    <div id="confirmPurchaseModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel">Proceed with Purchase</h3>
        </div>
        <div class="modal-body">
            <p>Do you want to confirm the purchase?</p>
            <?php
                $id = (int) $_SESSION['id'];

                $query = $conn->query("SELECT * FROM customer WHERE customerid = '$id'") or die(mysqli_error($conn));
                $fetch = $query->fetch_array();
				// Fetch the latest card details
				$card_query = $conn->query("SELECT * FROM transaction_detail WHERE transaction_id IN (SELECT transaction_id FROM transaction WHERE customerid = '$id') ORDER BY transaction_id DESC LIMIT 1") or die(mysqli_error($conn));
				$card_fetch = $card_query->fetch_array();
		
				// Retrieve encryption key and IV from environment variables
				$encryption_key = getenv('ENCRYPTION_KEY');
				$iv = getenv('ENCRYPTION_IV');
		
				// Decrypt the card details
				if ($card_fetch) {
					$decrypted_card_number = openssl_decrypt($card_fetch['card_number'], 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
					$decrypted_exp_date = openssl_decrypt($card_fetch['exp_date'], 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
					$decrypted_cvv = openssl_decrypt($card_fetch['cvv'], 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
				} else {
					$decrypted_card_number = '';
					$decrypted_exp_date = '';
					$decrypted_cvv = '';
				}
				?>

            <form method="post" action="">
                <h4>Shipping Address:</h4>
                <div class="form-group">
                <label for="address">Shipping Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $fetch['address']; ?>" required>
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<input type="text" class="form-control" id="country" name="country" value="<?php echo $fetch['country']; ?>" required>
				</div>
				<div class="form-group">
					<label for="zipcode">ZIP Code</label>
					<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $fetch['zipcode']; ?>" required>
				</div>

				<h4>Card Details:</h4>
				<div class="form-group">
					<label for="card_number">Card Number</label>
					<input type="text" class="form-control" id="card_number" name="card_number" value="<?php echo $decrypted_card_number; ?>" required>
				</div>
				<div class="form-group">
					<label for="exp_date">Expiration Date (MM/YY)</label>
					<input type="text" class="form-control" id="exp_date" name="exp_date" value="<?php echo $decrypted_exp_date; ?>" required>
				</div>
				<div class="form-group">
					<label for="cvv">CVV</label>
					<input type="text" class="form-control" id="cvv" name="cvv" value="<?php echo $decrypted_cvv; ?>" required>
				</div>
				<p>Do you want to confirm the purchase?</p>
				
                
                <button type="submit" name="pay_now" class="btn btn-success">Yes</button>
				<?php 
				if (isset($_POST['pay_now'])) {
					// Include the random code generator
					include("./function/random_code.php"); // Assuming this file generates a random code

					$t_id = $r_id; // Assign the generated random code to $t_id

					// Process payment here
					$cid = (int)$_SESSION['id'];
					$total = $_POST['total'];
					$p_id = $_POST['pid'];
					$oqty = $_POST['qty'];

					// Combine the shipping address details
					$address = $_POST['address'];
					$country = $_POST['country'];
					$zipcode = $_POST['zipcode'];
					$shippingAddress = $address . ', ' . $country . ', ' . $zipcode;

					// Card details
					$card_number = $_POST['card_number'];
					$exp_date = $_POST['exp_date'];
					$cvv = $_POST['cvv'];

					// Retrieve encryption key and IV from environment variables
					$encryption_key = getenv('ENCRYPTION_KEY');
					$iv = getenv('ENCRYPTION_IV');

					// Encrypt the shipping address and card details
					$encrypted_shippingAddress = openssl_encrypt($shippingAddress, 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
					$encrypted_card_number = openssl_encrypt($card_number, 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
					$encrypted_exp_date = openssl_encrypt($exp_date, 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));
					$encrypted_cvv = openssl_encrypt($cvv, 'aes-256-cbc', hex2bin($encryption_key), 0, hex2bin($iv));

					// Insert into the transaction table
					$date = date("M d, Y");
					$que = $conn->query("INSERT INTO `transaction` (transaction_id, customerid, amount, order_stat, order_date) 
										VALUES ('$t_id', '$cid', '$total', 'ON HOLD', '$date')") or die(mysqli_error($conn));

					// Insert into the transaction_detail table
					$i = 0;
					foreach ($p_id as $pro_id) {
						$conn->query("INSERT INTO `transaction_detail` (`product_id`, `order_qty`, `transaction_id`, `shippingAddress`, `card_number`, `exp_date`, `cvv`) 
									VALUES ('$pro_id', '$oqty[$i]', '$t_id', '$encrypted_shippingAddress', '$encrypted_card_number', '$encrypted_exp_date', '$encrypted_cvv')") or die(mysqli_error($conn));
						$i++;
					}

					// Redirect to summary page after successful payment
					header("Location: summary.php?tid=$t_id");
					exit(); // Ensure no further output after redirection
				}
				?>



                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </form>
        </div>
    </div>
	</form>
	</div>

		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Mode Of Payment</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="image" src="images/button.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"  />
						<br/>
						<br/>
						<button class="btn btn-lg" >Cash</button>
					</center>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>


		<br />
		<br />
</div>
<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">THO THRIFT Inc. 2024  </p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						 <a href="#"><li>Facebook</li></a>
						<a href="#"><li>Twitter</li></a>
						<a href="#"><li>Pinterest</li></a>
						<a href="#"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
	
</body>
</html>
<?php
ob_end_flush(); // Flush the output
?>
