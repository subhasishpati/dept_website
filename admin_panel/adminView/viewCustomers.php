<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="./assets/css/style.css"></link>
</head>
<body>
   
    <div >
        <h2 style="color:#002D72">All Teachers</h2>
        <table class="table ">
          <thead>
            <tr>
              <th class="text-center">S.N.</th>
              <th class="text-center">Teacher Name </th>
              <th class="text-center">Teacher ID </th>
              <th class="text-center">Email</th>
              <th class="text-center">Contact Number</th>
              <th class="text-center">Designation</th>
              <th class="text-center">Joining Date</th>
            </tr>
          </thead>
          <?php
            include_once "../config/dbconnect.php";
            $sql="SELECT * from teachers ";
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
      
        <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
          Add Teacher
        </button>
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">New Teacher</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form enctype="multipart/form-data" action="./controller/addCatController.php" method="POST">
          <div class="form-group">
              <label for="username">Teacher name:</label>
              <input type="text" class="form-control" name="username" required>
          </div>
          <div class="form-group">
              <label for="teacherId">Teacher ID:</label>
              <input type="text" class="form-control" name="teacherId" required>
          </div>
          
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
              <label for="contact_no">Contact Number:</label>
              <input type="tel" class="form-control" name="contact_no" required>
          </div>
          <div class="form-group">
              <label for="joining_date">Joining Date:</label>
              <input type="date" class="form-control" name="joining_date" required>
          </div>
          <div class="form-group">
              <label for="designation">Designation:</label>
              <input type="text" class="form-control" name="designation" required>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="add_dealer" style="height:40px">Add User</button>
          </div>
      </form>
      
      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
              </div>
            </div>
            
          </div>
        </div>
      
        
      </div>
         
</body>
</html>