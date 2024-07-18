<?php
include_once "../config/dbconnect.php";

$order_id = $_POST['record'];

// Retrieve the current status from the 'complains' table
$sql = "SELECT status FROM complains WHERE sl_no='$order_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentStatus = $row["status"];

    // Update the status based on the current value
    if ($currentStatus == "pending") {
        $newStatus = "under process";
    } elseif ($currentStatus == "under process") {
        $newStatus = "resolved";
    } else {
        $newStatus = "pending";
    }

    // Update the status in the 'complains' table
    $updateQuery = "UPDATE complains SET status='$newStatus' WHERE sl_no='$order_id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "No records found.";
}
?>
