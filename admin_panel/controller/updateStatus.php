<?php
// updateStatus.php

// Include the necessary database connection code
include_once "../config/dbconnect.php";

// Check if the request contains the "sgid" parameter
if (isset($_POST['sgid'])) {
  $sgid = $_POST['sgid'];

  // Update the status column value to "Resolved" in the database
  $sql = "UPDATE complains SET status = 'Resolved' WHERE sgid = '$sgid'";
  if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
  } else {
    echo "Error updating status: " . $conn->error;
  }
} else {
  echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
