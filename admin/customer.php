<?php

	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>THO THRIFT</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>THO THRIFT</label>

		<?php
			// Ensure session is started in session.php
			include("../function/session.php");

			// Check if user is logged in
			if (!isset($_SESSION['id'])) {
				header("Location: ../login.php"); // Redirect if not logged in
				exit();
			}

			$id = (int) $_SESSION['id'];

			// Retrieve admin information securely
			$query = $conn->prepare("SELECT username FROM admin WHERE adminid = ?");
			$query->bind_param("i", $id);
			$query->execute();
			$result = $query->get_result();

			if ($fetch = $result->fetch_assoc()) {
				$username = htmlspecialchars($fetch['username']); // XSS prevention
			} else {
				$username = 'Unknown';
			}

			$query->close();
		?>

		<ul>
			<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>
			<li>Welcome:&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $username; ?></a></li>
		</ul>
	</div>

	<br>

	<div id="leftnav">
		<ul>
			<li><a href="#">Products</a>
				<ul>
					<li><a href="admin_feature.php" style="font-size:15px; margin-left:15px;">Featured</a></li>
					<li><a href="admin_top.php" style="font-size:15px; margin-left:15px;">Top</a></li>
					<li><a href="admin_bottom.php" style="font-size:15px; margin-left:15px;">Bottom</a></li>
					<li><a href="admin_cap.php" style="font-size:15px; margin-left:15px;">Cap</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transactions</a></li>
			<li><a href="customer.php">Customers</a></li>
			<li><a href="message.php">Messages</a></li>
			<li><a href="order.php">Orders</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
		<div class="alert alert-info"><center><h2>Customers</h2></center></div>
		<br />
		<label style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Customers here..." id="filter"></label>
		<br />

		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
					<tr style="font-size:20px;">
						<th>Name</th>
						<th>Address</th>
						<th>Province</th>
						<th>Zipcode</th>
						<th>Mobile</th>
						<th>Telephone</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php
						// Fetch and display customer data securely
						$query = $conn->query("SELECT firstname, mi, lastname, address, country, zipcode, mobile, telephone, email FROM customer") or die(mysqli_error());

						while($fetch = $query->fetch_assoc()) {
							// XSS prevention using htmlspecialchars
							$firstname = htmlspecialchars($fetch['firstname']);
							$mi = htmlspecialchars($fetch['mi']);
							$lastname = htmlspecialchars($fetch['lastname']);
							$address = htmlspecialchars($fetch['address']);
							$country = htmlspecialchars($fetch['country']);
							$zipcode = htmlspecialchars($fetch['zipcode']);
							$mobile = htmlspecialchars($fetch['mobile']);
							$telephone = htmlspecialchars($fetch['telephone']);
							$email = htmlspecialchars($fetch['email']);

							echo "<tr>";
							echo "<td>{$firstname} {$mi} {$lastname}</td>";
							echo "<td>{$address}</td>";
							echo "<td>{$country}</td>";
							echo "<td>{$zipcode}</td>";
							echo "<td>{$mobile}</td>";
							echo "<td>{$telephone}</td>";
							echo "<td>{$email}</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>

	</div>

</body>
</html>
