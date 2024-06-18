<?php
session_start();

include("function/login.php");
include("function/customer_signup.php");

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // User is logged in, check the current page
    $currentPage = basename($_SERVER['PHP_SELF']);
    $loggedInPage = "home.php";

    // If the user is not already on the logged-in page, redirect
    if ($currentPage !== $loggedInPage) {
        header("Location: $loggedInPage");
        exit();
    }
} else {
    // User is not logged in, check the current page
    $currentPage = basename($_SERVER['PHP_SELF']);
    $loggedOutPage = "index.php";

    // If the user is not already on the non-logged-in page, redirect
    if ($currentPage !== $loggedOutPage) {
        header("Location: $loggedOutPage");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Online  Shoe Store</title>
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

	<br>

	
<div id="container">

	<div id="carousel">
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="picture/banner1.jpg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="picture/banner3.jpeg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="picture/banner4.png" class="carousel"></div>
			</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>


	<div id="video">
		<video controls autoplay width="445px" height="300px">
			<source src="video/thrift video.mp4" type="video/mp4">
		</video>
	</div>


	<div id="content">
		<div id="product" style="position:relative;">
			<center><h2><legend>Featured Items</legend></h2></center>
			<br />

			<?php

				$query = $conn->query("SELECT *FROM product WHERE category='feature' ORDER BY product_id DESC") or die (mysqli_error());

					while($fetch = $query->fetch_array())
						{

						$pid = $fetch['product_id'];

						$query1 = $conn->query("SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
						$rows = $query1->fetch_array();

						$qty = $rows['qty'];
						if($qty <= 5){

						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='picture/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
							echo " ".$fetch['product_name']."";
							echo "<br />";
							echo "<strong>RM " . $fetch['product_price'] . "</strong>";
							echo "<br />";
							echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> Size: ".$fetch['product_size']."</h3>";
							echo "</center>";
							echo "</div>";
						}

						}
			?>
		</div>



	</div>

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
