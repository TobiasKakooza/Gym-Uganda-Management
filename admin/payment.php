<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym System Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../css/fullcalendar.css">
    <link rel="stylesheet" href="../css/matrix-style.css">
    <link rel="stylesheet" href="../css/matrix-media.css">
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet">
    <link href="../font-awesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.gritter.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <style>
        /* Header */
        #header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Custom Search Form */
        #custom-search-form {
            margin: 10px 0;
            padding: 0;
            text-align: right;
        }

        #custom-search-form .search-query {
            padding: 8px 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 14px;
            width: 200px;
            box-sizing: border-box;
        }

        #custom-search-form button {
            border: none;
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #custom-search-form button:hover {
            background-color: #0056b3;
        }

        /* Table */
        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table th, .table td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Footer */
        #footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<?php $page='payment'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="payment.php" class="current">Payments</a> </div>
        <h1 class="text-center">Registered Member's Payment <i class="fas fa-group"></i></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class='widget-box'>
                    <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                        <h5>Member's Payment table</h5>
                        <form id="custom-search-form" role="search" method="POST" action="search-result.php" class="form-search form-horizontal pull-right">
                            <div class="input-append span12">
                                <input type="text" class="search-query" placeholder="Search" name="search" required>
                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class='widget-content nopadding'>
                        <?php

                        include "dbcon.php";
                        $qry = "SELECT * FROM members";
                        $cnt = 1;
                        $result = mysqli_query($conn, $qry);

                        echo "<table class='table table-bordered data-table table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Member</th>
                                        <th>Last Payment Date</th>
                                        <th>Amount</th>
                                        <th>Choosen Service</th>
                                        <th>Plan</th>
                                        <th>Action</th>
                                        <th>Remind</th>
                                    </tr>
                                </thead>";

                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                            <td><div class='text-center'><?php echo $cnt;?></div></td>
                            <td><div class='text-center'><?php echo $row['fullname']?></div></td>
                            <td><div class='text-center'><?php echo($row['paid_date'] == 0 ? "New Member" : $row['paid_date'])?></div></td>

                            <?php
                            // Fetching the amount and converting it to UGX
                            $amount_usd = $row['amount'];
                            $exchange_rate = 3550; // Adjust this based on the actual exchange rate
                            $amount_ugx = $amount_usd * $exchange_rate;
                            ?>

                            <td><div class='text-center'><?php echo 'UGX ' . number_format($amount_ugx, 2)?></div></td>
                            <td><div class='text-center'><?php echo $row['services']?></div></td>
                            <td><div class='text-center'><?php echo $row['plan']." Month/s"?></div></td>
                            <td><div class='text-center'><a href='user-payment.php?id=<?php echo $row['user_id']?>'><button class='btn btn-success btn'><i class='fas fa-dollar-sign'></i> Make Payment</button></a></div></td>
                            <td><div class='text-center'><a href='sendReminder.php?id=<?php echo $row['user_id']?>'><button class='btn btn-danger btn' <?php echo($row['reminder'] == 1 ? "disabled" : "")?>>Alert</button></a></div></td>
                            </tbody>
                            <?php $cnt++;
                        }

                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By Tobias Developer</a> </div>
</div>

<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.flot.min.js"></script>
<script src="../js/jquery.flot.resize.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.dashboard.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/matrix.interface.js"></script>
<script src="../js/matrix.chat.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.wizard.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.popover.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
