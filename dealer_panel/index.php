<?php 
 error_reporting(E_ERROR | E_PARSE);
 session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     header("location: ./admin_login.php");
     exit;
}
else{
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Teacher</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../admin_panel/assets/css/style.css"></link>
  </head>
</head>
<body >
    
        <?php
         


            include "./dealerHeader.php";
            include "./sidebar.php";
           
            include_once "./config/dbconnect.php";

            $fetchq = $_SESSION['user_id'];
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
           

           
           
       
            
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
<?php
}

 ?>