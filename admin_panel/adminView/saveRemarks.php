<?php
include_once "../config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the submitted remark and sl_no
  $remark = $_POST["remark"];
  $forward =$_POST["forward"];
  $slNo = $_POST["sl_no"];

  // Update the remark and status in the database
  $updateSql = "UPDATE complains SET remarkbyAdmin = '$remark', forwardTo = '$forward', status = 'under-process' WHERE sl_no = $slNo";

  if ($conn->query($updateSql) === TRUE) {
    echo "Remarks saved successfully!";
    if(isset($_SERVER['HTTP_REFERER'])) {
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
  } else {
      // If there is no previous page, redirect to a default page
      header("Location: ./index.php");
      exit;
  }
    
  } else {
    echo "Error updating remarks: " . $conn->error;
  }
}
?>
