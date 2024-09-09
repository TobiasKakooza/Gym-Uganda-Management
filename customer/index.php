<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <!-- Visit Tobias Developerfor more projects -->
<head>
        <title>Gym System Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



    </head>

    <style type="text/css">
 /* Custom CSS for index.php */
body {
    background-image: url('your-background-image.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    padding: 0;
    height: 100%;
}

#loginbox {
    width: 400px;
    margin: 100px auto;
    background: rgba(255, 255, 255, 0.8); /* Adjust background transparency */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

#loginbox h3 {
    text-align: center;
    margin-bottom: 20px;
}

#loginform .control-group {
    margin-bottom: 20px;
}

#loginform .main_input_box {
    position: relative;
}

#loginform .main_input_box input {
    width: 100%;
    padding: 10px 30px 10px 40px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

#loginform .main_input_box .add-on {
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 100%;
    background: #f3f3f3;
    border-radius: 5px 0 0 5px;
    text-align: center;
    line-height: 34px;
    color: #666;
}

#loginform .form-actions {
    margin-top: 20px;
}

#loginform .form-actions .pull-left {
    float: left;
}

#loginform .form-actions .pull-right {
    float: right;
}

#loginform .form-actions button[type="submit"] {
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #5cb85c;
    border: none;
    color: #fff;
    transition: background-color 0.3s;
}

#loginform .form-actions button[type="submit"]:hover {
    background-color: #4cae4c;
}

.g {
    text-align: center;
    margin-top: 10px;
}

.g a {
    color: #337ab7;
}

.g a:hover {
    color: #23527c;
}

/* Additional styling for the flip-link */
.flip-link {
    text-decoration: none;
    color: #fff;
}

.flip-link:hover {
    color: #fff;
}

/* Style for the 'Join Now!' button */
#to-recover {
    background-color: #5bc0de;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    color: #fff;
    transition: background-color 0.3s;
}

#to-recover:hover {
    background-color: #46b8da;
}

/* Style for the 'Go Back' link */
.g a {
    background-color: #d9534f;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    color: #fff;
    transition: background-color 0.3s;
}

.g a:hover {
    background-color: #c9302c;
}


    </style>


    
    <body>
    
    <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="#">
				 <div class="control-group normal_text"> <h3>Customer Login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="user" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Join Now!</a></span>
                    <span class="pull-right"><button type="submit" name="login" class="btn btn-success" />Customer Login</button></span>
                </div>
                <div class="g">
                <a href="../index.php"><h6>Go Back</h6></a>
                </div>
                
                <?php
                if (isset($_POST['login']))
                    {
                        $username = mysqli_real_escape_string($con, $_POST['user']);
                        $password = mysqli_real_escape_string($con, $_POST['pass']);

                        $password = md5($password);
                        
                        $query 		= mysqli_query($con, "SELECT * FROM members WHERE  password='$password' and username='$username' and status='Active'");
                        $row		= mysqli_fetch_array($query);
                        $num_row 	= mysqli_num_rows($query);
                        
                        if ($num_row > 0) 
                            {			
                                $_SESSION['user_id']=$row['user_id'];
                                header('location:pages/index.php');
                                
                            }
                        else
                            {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Invalid Username/Password or Account has been Expired!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                            }
                    }
            ?>
            </form>
            <form id="recoverform" action="../customer/pages/register-cust.php" method="POST" class="form-vertical">
				<p class="normal_text">Enter your details below and we will send your details for further activation process.</p>
			

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-pencil"></i></span><input type="text" name="fullname" placeholder="Fullname" />
                        </div>
                    </div>

                    <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="text" name="username" placeholder="@username" />
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>

                <br>

                       <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="number" name="contact" placeholder="7878787878" />
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="text" name="address" placeholder="Address" />
                        </div>
                    </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <select name="gender" required="required" id="select">
                                    <option value="Male" selected="selected">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                            <select name="plan" required="required" id="select">
                            <option selected="true" disabled="disabled">Select Plans</option>
                                <option value="1" >One Month</option>
                                <option value="3">Three Month</option>
                                <option value="6">Six Month</option>
                                <option value="12">One Year</option>
                            </select>
                            </div>
                        </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                            <select name="services" required="required" id="select">
                            <option selected="true" disabled="disabled">Select Service</option>
                                <option value="Fitness" >Fitness</option>
                                <option value="Sauna">Sauna</option>
                                <option value="Cardio">Cardio</option>
                            </select>
                            </div>
                        </div>

                    
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button class="btn btn-info" type="SUBMIT">Submit Details</button></span>
                </div>

                
            </form>
        </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>
