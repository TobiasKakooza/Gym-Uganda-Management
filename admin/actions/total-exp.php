<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$db = "gymnsb";

$conn = mysqli_connect($servername, $uname, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Fetch the exchange rate from USD to UGX (You may need to adjust this based on your actual exchange rate)
$exchange_rate = 3550; // 1 USD = 3700 UGX

$sql = "SELECT SUM(amount) AS total_expenses FROM equipment";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$total_expenses_usd = $row['total_expenses'];

// Convert total expenses from USD to UGX
$total_expenses_ugx = $total_expenses_usd * $exchange_rate;

// Output the total expenses in UGX
echo number_format($total_expenses_ugx, 2) . ' UGX';

// Close the connection
mysqli_close($conn);
?>
