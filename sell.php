<?php
session_start();

include("function/login.php");
include("function/customer_signup.php");

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // User is logged in, check the current page
    $currentPage = basename($_SERVER['PHP_SELF']);
    $loggedInPage = "sell1.php";

    // If the user is not already on the logged-in page, redirect
    if ($currentPage !== $loggedInPage) {
        header("Location: $loggedInPage");
        exit();
    }
} else {
    // User is not logged in, check the current page
    $currentPage = basename($_SERVER['PHP_SELF']);
    $loggedOutPage = "sell.php";

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

	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Login...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="password" placeholder="Password" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>

	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Sign Up Here...</h3>
				</div>
					<div class="modal-body">
						<center>
					<form method="post">
						<input type="text" name="firstname" placeholder="Firstname" required>
						<input type="text" name="mi" placeholder="Middle Initial" maxlength="1" required>
						<input type="text" name="lastname" placeholder="Lastname" required>
						<input type="text" name="address" placeholder="Address" style="width:430px;"required>
						<input type="text" name="country" placeholder="Province" required>
						<input type="text" name="zipcode" placeholder="ZIP Code" required maxlength="4">
						<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
						<input type="text" name="telephone" placeholder="Telephone Number" maxlength="8">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						</center>
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>

	<br>
<div id="container">

		<img src="img/thrift.png" style="width:1150px; height:250px; border:1px solid #000; ">
	<br />
	<br />

	<legend>Freshen up your style. For your wallet. For the planet.</legend>
		<div id="content">
			<legend><h3>Clean out your wardrobe at THO THRIFT!</h3></legend>
					<h4>Ever get tired and overwhelmed with the many clothes that are stored in your wardrobe?
						We are here for you! Clear up your clothes collection at THO THRIFT! 
					</h4>
			<br />
				<legend><h3>How does it work?</h3></legend>
					<h4>On every Thursday, pack your clothes (Minimum 5 pcs) that you are no 
						longer wearing and meet us at HEP UTHM! Each of your clothes will be inspected by our team, 
						and within a short period, you will receive a quote for your clothes. Upon agreement, we will 
						take your clothes into good hands and pay you immediately!
						(Note: We accept Womenswear and Menswear.)
					</h4>
			<br />
		</div>
	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyrght &copy; </label>
			<p style="font-size:25px;">THO THRIFT Inc. 2024 Brought To You by <a href="https://code-projects.org/">Code-Projects</a></p>
		</div>

			<div id="foot">
				<h4>Links</h4>
					<ul>
						<a href="http://www.facebook.com/OnlineShoeStore"><li>Facebook</li></a>
						<a href="http://www.twitter.com/OnlineShoeStore"><li>Twitter</li></a>
						<a href="http://www.pinterest.com/OnlineShoeStore"><li>Pinterest</li></a>
						<a href="http://www.tumblr.com/OnlineShoeStore"><li>Tumblr</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
