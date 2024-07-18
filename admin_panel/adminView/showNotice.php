

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/css/style.css"></link>
</head>
<body>
   
    <div >
        <h2 style="color:#002D72">All Notices</h2>
        <table class="table ">
          <thead>
            <tr>
              <th class="text-center">S.N.</th>
              <th class="text-center">Title </th>
              <th class="text-center">Remark </th>
              <th class="text-center">Date</th>
              <th class="text-center">file</th>
            </tr>
          </thead>
          <?php
            include_once "../config/dbconnect.php";
         
            $sql="SELECT * from notices ";
            $result=$conn-> query($sql);
            $count=1;
            if ($result-> num_rows > 0){
              while ($row=$result-> fetch_assoc()) {
                 
          ?>
          <tr>
            <td><?=$count?></td>
            <td><?=$row["title"]?></td>
            <td><?=$row["remarks"]?></td>
            <td><?=$row["date"]?></td>
            <td><?=$row["file_path"]?></td>
          </tr>
          <?php
                  $count=$count+1;
                 
              }
          }
          ?>
        </table>
      
        
      
     
     
        
      </div>
         
</body>
</html>