<?php

$fetchq = $_SESSION['user_id'];



// Logout function

function logout() {
    // Add your logout logic here
    // This could involve clearing session data, updating database records, etc.
    // For this example, we'll simply destroy the session
    session_destroy();
    $_SESSION['loggedin'] = false;
    // Redirect the user to the login page or any other desired page
    header("Location: admin_login.php");
    exit();
}

// Check if the user is already logged out
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    header("Location: admin_login.php");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    logout();
}
?>


<!-- Include Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">





<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img src="../IGIT.png" width="120" height="120" alt="IGIT">
        <h5 style="margin-top:10px;">Hello, <?php echo $fetchq; ?></h5>
    </div>

    <hr style="border:1px solid; background-color:#001F51; border-color:#002D72;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
    <!-- <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Complaints</a> -->
    <a href="./adminView/manageNotice.php" onclick="manageNotice()"><i class="fa fa-users"></i> manageNotice</a>
    <a href="#customers" onclick="showCustomers()"><i class="fa fa-users"></i> Teacher Details</a>
    <a href="./adminView/showNotice.php" onclick="showNotice()"><i class="fa fa-users"></i> All Notices</a>
    <!-- <a href="#category" onclick="showCategory()"><i class="fa fa-th-large"></i> Resolved Complaints</a> -->
    <a onclick="logout()"  style="margin-left:30px;color:white; margin-top:160px; padding-left: 5px;" ><i class="bi bi-box-arrow-right" style="margin-right:8px"></i>Logout</a>
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()" style="position:absolute;"><i class="fa fa-home"></i></button>
</div>

<script>
    function logout() {
        // Add an AJAX request here if you need to perform any server-side operations

        // Redirect the user to the logout page
        window.location.href = "../index.php";
    }

    window.onload = function() {
        window.history.replaceState(null, null, window.location.href);
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

