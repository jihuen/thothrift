<link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
<header class="header">
  <h1 class="logo"><a href="index.php">THO Thrift.</a></h1>
  <ul class="main-nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="product.php">Product</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="aboutus.php">About</a></li>
    <li><a href="contactus.php">Contact us</a></li>

    <?php
    // Check if the user is logged in
    if(isset($_SESSION['id'])) {
      $id = (int)$_SESSION['id'];
      $query = $conn->query("SELECT * FROM customer WHERE customerid = '$id'") or die(mysqli_error());
      $fetch = $query->fetch_array();
    ?>
        <li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href data-toggle="modal">
        <?php echo $fetch['firstname']; ?>&nbsp;
        <?php echo $fetch['lastname']; ?></a></li>
        <li><a class="account" href="function/logout.php"><i class="icon-off icon-white"></i>Logout</a></li>
    <?php
    } else {
    ?>
      <li><a class="account" href="#login" data-toggle="modal">Login</a></li>
      <li><a class="account" href="#signup" data-toggle="modal">Sign Up</a></li>
    <?php
    }
    ?>
  </ul>
</header>
