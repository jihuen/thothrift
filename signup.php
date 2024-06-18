<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - THO Thrift</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/THOTRIFF.png') no-repeat center center fixed;
            background-size: cover;
        }

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-form {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%; /* Adjust width as needed */
            max-width: 600px; /* Set a maximum width to prevent it from becoming too wide */
        }

        .signup-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-form">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mi">Middle Initial:</label>
                        <input type="text" id="mi" name="mi" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="country">Country:</label>
                        <input type="text" id="country" name="country" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zip Code:</label>
                        <input type="text" id="zipcode" name="zipcode" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile:</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Telephone:</label>
                        <input type="text" id="telephone" name="telephone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
            <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional, only if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('db/dbconn.php');

        $firstname = $_POST['firstname'];
        $mi = $_POST['mi'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $zipcode = $_POST['zipcode'];
        $mobile = $_POST['mobile'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if email already exists
        $query = $conn->query("SELECT * FROM customer WHERE email = '$email'");
        $check = $query->num_rows;

        if ($check > 0) {
            echo "<script>alert('Email already exists')</script>";
            echo "<script>window.location = 'signup.php'</script>";
            exit();
        } else {
            // Hash the password before storing in database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new customer record into database
            $conn->query("INSERT INTO customer (firstname, mi, lastname, address, country, zipcode, mobile, telephone, email, password)
                          VALUES ('$firstname', '$mi', '$lastname', '$address', '$country', '$zipcode', '$mobile', '$telephone', '$email', '$hashed_password')")
                or die(mysqli_error($conn));

            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.location = 'login.php'</script>";
            exit();
        }
    }
    ?>
</body>
</html>
