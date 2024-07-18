

<?php
include_once "../config/dbconnect.php";

if (isset($_POST['add_dealer'])) {
    $username = $_POST['username'];
    $teacherId=$_POST['teacherId'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact_no'];
    $joiningDate = $_POST['joining_date'];
    $designation = $_POST['designation'];

    $sql = "SELECT sl_no FROM teachers ORDER BY sl_no DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $serialNumber = $row['sl_no'] + 1;
    
    // Generate a random password
    $password = generatePassword();
    
    // Insert new dealer into the "dealers" table
    $insert = mysqli_query($conn, "INSERT INTO teachers (teacher_name,teacher_id, email, number, joining_date, designation, password) VALUES ('$username','$teacherId' '$email', '$contactNo', '$joiningDate', '$designation', '$password','$serialNumber')");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../dashboard.php?category=error");
        exit();
    } else {
        echo "Teacher added successfully. Password: " . $password;
        header("Location: ../index.php?category=success");
        exit();
    }
}

// Function to generate a random password
function generatePassword($length = 6) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>
