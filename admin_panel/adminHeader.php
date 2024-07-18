<?php
   
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color:  #1E1E1E;">
    
    <div style="display:flex;">
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="../IGIT.png" width="100" height="100" alt="Igit logo">
    </a>
    <div style="font-size:20px; font-family: 'Merriweather';
           margin-left:200px;margin-top: 23px; color:white; ">
          <h2>Department of<br>Computer Science Engineering & Application </h2>
    </div>
    
    </div>
    <div style=" transform:translate(210%,0%);">
    <div class="home" style=" 
           display: block;
            height: 50px;
            width: 50px;
            margin-left:30px;
            margin-top:10px;
           /* margin-right: 15px; */
            justify-content: center;
           
            color: whitesmoke; 
                 
          ">
            <a href="../index.php" ><img src="../bxs-home.svg" alt=""></a>
    </div>
    </div>
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
