<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../admin_panel/assets/css/style.css"></link>
</head>
<body>
   
    <div >
        <h2>Your Details</h2>
        <table class="table ">
          <thead>
            <tr>
              <th class="text-center">S.N.</th>
              <th class="text-center">Teacher name </th>
              <th class="text-center">Teacher Id </th>
              <th class="text-center">Email</th>
              <th class="text-center">Contact Number</th>
              <th class="text-center">Designation</th>
              <th class="text-center">Joining Date</th>
            </tr>
          </thead>
          <?php
            include_once "../config/dbconnect.php";
            $fetchs = $_SESSION['user_id'];
            $sql="SELECT * from teachers WHERE teacher_id='$fetchs'";
            $result=$conn-> query($sql);
            $count=1;
            if ($result-> num_rows > 0){
              while ($row=$result-> fetch_assoc()) {
                 
          ?>
          <tr>
            <td><?=$count?></td>
            <td><?=$row["teacher_name"]?></td>
            <td><?=$row["teacher_id"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["number"]?></td>
            <td><?=$row["designation"]?></td>
            <td><?=$row["joining_date"]?></td>
          </tr>
          <?php
                  $count=$count+1;
                 
              }
          }
          ?>
        </table>
      
      
      
        <!-- Modal -->
        
      </div>
         
</body>
</html>