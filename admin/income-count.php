<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$db = "gymnsb";

$conn = mysqli_connect($servername, $uname, $pass, $db);

if (!$conn) {
    die("Connection Failed");
}

$sql = "SELECT SUM(amount) FROM members";
$amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
$row_amountsum = mysqli_fetch_assoc($amountsum);
$totalRows_amountsum = mysqli_num_rows($amountsum);

// Assuming the conversion rate from dollars to Ugandan Shillings is 3550
$conversionRate = 3550;
$totalEarningsInDollars = $row_amountsum['SUM(amount)'];

// Convert total earnings to Ugandan Shillings
$totalEarningsInUgandanShillings = $totalEarningsInDollars * $conversionRate;

echo number_format($totalEarningsInUgandanShillings) . ' UGX'; // Output: Total Earnings: 3,550,000 UGX

?>
