<?php
   include 'navbar.php';
   include_once "../config/dbconnect.php";



  if(isset($_POST['submit'])){

    $division=$_POST['division'];
    $section=$_POST['section'];
    $userid=$_POST['user-id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $sgid= date("Yd").rand(0000,9999);
    session_start();
$_SESSION['sgid'] = $sgid;

    
    $sql="INSERT INTO complains SET
        division='$division',
        section='$section',
        userid='$userid',
        name='$name',
        phone='$phone',
        subject='$subject',
        sgid='$sgid'";
    $res=mysqli_query($conn,$sql);

   
    if($res==true){
      header("Location: confrm.php");
exit;

    }
    else{
      echo "not successful";
    }
  }

  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>IPAS complain Registration System</title>
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>

      /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

::-webkit-scrollbar{
  width: 10px;
}

::-webkit-scrollbar-thumb{
  background-color: #002D72;
  border-radius: 12px;
}

body {
  background-image: url(blue_train.jpg); 
  background-size: cover;
  background-repeat: no-repeat;
  
  left: 0px;
  top: 0px;
  z-index: -1;
  width: 100%;
  height: 130vh;
  background-size: cover; 
  margin: 0;
  
  
 
}

.container {
  /* position: fixed; */
  max-width: 650px;
  /* width: 100%; */
  background: #fff;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  min-height: 615px;
  margin-right: 50px;
  padding-top: 25PX;
  transform: translate(130%, 10%);
  overflow-y: scroll;
}

.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
  margin-bottom: 20px;
}

.container header h2 {
  padding-bottom: 15px;
  border-bottom: 1px solid #d9d9d9;
  font-size: 22px;
  color: #002D72;
  margin-bottom: 10px;
  text-align: left;
  padding-left: 10px;

}

.container .form {
  margin-top: 0px;
}

.form .input-box {
  width: 100%;
  margin-top: 20px;
}

.input-box label {
  color: #333;
}

.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}

.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.form .column {
  display: flex;
  column-gap: 15px;
}

.form-control {
  border: 0;
  font-size: 100%;
  font-style: inherit;
  font-weight: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  vertical-align: baseline;

  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;

}

.address :where(input, .select-box) {
  margin-top: 15px;
}

.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}

.labelText {
  font-size: 16px;
  color: #7c7c7c;
  font-weight: 400;
  padding-bottom: 5px;
  display: block;
}

.form .box {
  width: 100%;
  object-fit: cover;
  line-height: normal;
  resize: none;
  height: 125px;
  padding-left: 5px;
  padding-top: 5px;
  padding-bottom: 5px;
  font-size: 15px;
  border: 1px solid rgb(212, 211, 211);
  background-color: #f4f5f6;
  border-radius: 5px;
  /* overflow: auto; */

}

.btn {

  display: inline-block;
  text-decoration: none;
  margin: 0px 5px;
  padding: 9px 25px;
  line-height: 23px;
  border: 0;
  color: #f4f5f6;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  background-color: #002D72;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.col-12 {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 100%;
  flex: 0 0 100%;
  max-width: 100%;
  text-align: right;
  margin: 20px -10px 5px;
}

.form button:hover {
  background: rgb(88, 56, 250);
}

.mandatoryNote {
  position: absolute;
  right: 0;
  top: 4px;
  z-index:-1; 
  font-size: 16px;
  color: #000;
  font-weight: 400;
  padding: 40px 25px;
}

/*Responsive*/
@media screen and (max-width: 600px) {
  .form .column {
    flex-wrap: wrap;
  }
  /* body{
    background-image: url(steam-train-speeds-through-rural-sunset-scenery-generated-by-ai.jpg);
    background-repeat: repeat;
    background-size: cover;
  } */

  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }

  .container {
    margin-right: 0px;
  }
}
    </style>
    

  </head>
  <body >
    
    <section class="container">
      <header><h2>REGISTER COMPLAINT</h2></header>
      <form action="" class="form" id="myForm" method="POST">
        <p class="mandatoryNote "><span style="color: #f05f40; ">*</span><font class="Mandatory p">Mandatory Fields</font></p>

        <div class="column">
            <div class="input-box">
                <label for="div-hq" class="labelText"><font class="Type">DIVISION/HQ</font>
                    <span style="color: #f05f40;">*</span>
                </label>
                
        <div class="select-op">
            <select id="div-hq" class="form-control" name="division" required>
                <option value="selectL">--Select--</option>
                <?php echo $options; ?>
            </select>
        </div>
            </div>

            <div class="input-box">
                <label for="div-hq" class="labelText"><font class="Type" >Section</font>
                    <span style="color: #f05f40;">*</span>
                </label>
                
        <div class="select-op" class="input-box">
            <select id="section" class="form-control" name="section" required>
            <option value="selectL">--Select SECTION--</option>
            
            </select>
        </div>
            </div>
        </div>

        <div class="column">
           <div class="input-box">
            <label for="name" class="labelText"><font class="Type" >USER ID</font>
             <span style="color: #f05f40;">*</span></label>
             <div class="select-op" class="input-box">
              <select id="secwise_userid" class="form-control" name="user-id" required>
              <option value="selectL">--Select user id</option>
              </select>
          </div>
           </div>
           <div class="input-box">
            <label for="name" class="labelText"><font class="Type" >FULL NAME</font>
                <span style="color: #f05f40;">*</span></label>
                <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required>
           </div>
        </div>
        <div class="input-box">
            <label for="phone" class="labelText " ><font class="Type" >Phone no</font> <span style="color: #f05f40;">*</span></label>
        <input type="tel" id="phoneNumber" oninput="restrictInput(event)" name="phone" placeholder="Enter Your Phone no" pattern="[0-9]{10}" value=><br>
        </div>
      
          <div class="input-box">
            <label for="subject"class="labelText" ><font class="Type" >COMPLAINT</font> <span style="color: #f05f40;">*</span></label>
            <textarea id="subject" name="subject" placeholder="Write your complain.."  class="box" ></textarea>
        </div>
     
        <div class="column">
          <div class="col-12">
            <button class="btn" type="submit" name="submit">Submit</button>
            <button class="btn" onclick="reset()" >clear</button>
        </div>
        </div>
      </form>
    </section>
    <script src="script.js"></script>

    <script>
      function restrictInput(event) {
      var input = event.target.value;
      var numericInput = input.replace(/\D/g, ''); // Remove non-digit characters
      event.target.value = numericInput;
    }
        $(document).ready(function() {
            // AJAX request to fetch categories
            $.ajax({
                url: 'fetch_section.php',
                type: 'GET',
                success: function(response) {
                    $('#section').html(response);
                }
            });

            // AJAX request to fetch subcategories based on selected category
            $('#section').on('change', function() {
                var section = $(this).val();

                if (section) {
                    $('#secwise_userid').prop('disabled', true);
                    $.ajax({
                        url: 'fetch_userid.php',
                        type: 'POST',
                        data: { section: section },
                        success: function(response) {
                            $('#secwise_userid').prop('disabled', false);
                            $('#secwise_userid').html(response);
                        }
                    });
                } else {
                    $('#secwise_userid').prop('disabled', true);
                    $('#secwise_userid').html('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
  </body>
</html>
<?php
  

?>

