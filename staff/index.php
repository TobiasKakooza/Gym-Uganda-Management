<?php
session_start();
include 'dbcon.php';
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $password = md5($password);

    $query      = mysqli_query($con, "SELECT * FROM staffs WHERE password='$password' and username='$username'");
    $row        = mysqli_fetch_array($query);
    $num_row    = mysqli_num_rows($query);

    if ($num_row > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        header('location:staff-pages/index.php');
        exit();
    } else {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                Invalid Username and Password
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym System Staff Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        body {
            background-image: url('img/gym1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Open Sans', sans-serif; /* Adding a fallback font */
            margin: 0; /* Resetting default margin */
            padding: 0; /* Resetting default padding */
            height: 100%; /* Making sure body takes up entire viewport height */
        }

        #loginbox {
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.7); /* Adding a semi-transparent white background to the login box */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Adding a subtle shadow effect */
        }

        #loginbox h3 {
            margin-bottom: 20px; /* Adding some spacing below the logo */
            text-align: center; /* Centering the logo */
        }

        .main_input_box {
            position: relative;
        }

        .main_input_box input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none; /* Removing default input outline */
        }

        .add-on {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #ccc;
        }

        .form-actions {
            text-align: center; /* Centering the submit button */
        }

        .btn-staff-login {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f0ad4e; /* Button background color */
            color: #fff; /* Button text color */
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-staff-login:hover {
            background-color: #ec971f; /* Darker background color on hover */
        }

        .pull-left,
        .pull-right {
            text-align: center; /* Centering the login links */
            margin-top: 20px; /* Adding some spacing between login links and login box */
        }

        .pull-left a,
        .pull-right a {
            color: #fff; /* Setting the color of login links */
            text-decoration: none; /* Removing default underline */
            font-weight: bold; /* Making the login links bold */
            margin: 0 10px; /* Adding some spacing between login links */
            display: inline-block; /* Ensuring proper alignment */
            padding: 5px 10px; /* Adding padding for better appearance */
            border-radius: 5px; /* Adding border radius for rounded corners */
            background-color: rgba(0, 0, 0, 0.5); /* Setting a semi-transparent background color */
            transition: background-color 0.3s ease; /* Adding a smooth transition effect */
        }

        .pull-left a:hover,
        .pull-right a:hover {
            background-color: rgba(0, 0, 0, 0.7); /* Darkening the background color on hover */
        }
    </style>
</head>

<body>
    <div id="loginbox">
        <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text">
                <h3><img src="img/icontest3.png" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="user" placeholder="Username" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">
                <button type="submit" class="btn btn-block btn-large btn-warning" title="Log In" name="login" value="Admin Login">Staff Login</button>
            </div>
        </form>

        <div class="pull-left"><!-- Visit Tobias Developerfor more projects -->
            <a href="../index.php"><h6>Admin Login</h6></a>
        </div>

        <div class="pull-right">
            <a href="../customer"><h6>Customer Login</h6></a>
        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/matrix.login.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/matrix.js"></script>
</body>

</html>
