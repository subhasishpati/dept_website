<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="orders1Btn" >
    <h2>Resolved Complaints </h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sl.No.</th>
          <th>User Id</th>
          <th>SG Id</th>
          <th>Complain Description</th>
          <th>Remark by Admin</th>
          <th>Remark by Dealer</th>
          <th>complain Status</th>
       </tr>
      </thead>
       <?php
      //  error_reporting(E_ERROR | E_PARSE);
        include "../config/dbconnect.php";
        $fetchq = $_SESSION['user_id'];
        $serialNo = 1;
        $sql="SELECT * from complains WHERE forwardTo='$fetchq' AND status = 'Resolved' ";
        $result=$conn-> query($sql);
        
        if ($result-> num_rows > 0){
          while ($row=$result-> fetch_assoc()) {
            $status=$row["status"];
            
      ?>
         <tr>
            <td><?=$serialNo?></td>
            <td><?=$row["userid"]?></td>
            <td><?=$row["sgid"]?></td>
            <td><?=$row["subject"]?></td>
            <td><?=$row["remarkbyAdmin"]?></td>
            <td><?=$row["remarkbyDealer"]?></td>
            <?php
  
  ?>
            
                
          <td><a class="btn btn-success " ><?=$row["status"]?></a></td>
          
          </tr>
      <?php
            $serialNo++;  
          }
        }
      ?>
       
    </table>
     
  </div>
  <!-- Modal -->
  <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title">Commplain Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="order-view-modal modal-body">
          
          </div>
        </div><!--/ Modal content-->
      </div><!-- /Modal dialog-->
    </div>
  <script>
       //for view order modal  
       $(document).ready(function(){
        $('.openPopup').on('click',function(){
          var dataURL = $(this).attr('data-href');
      
          $('.order-view-modal').load(dataURL,function(){
            $('#viewModal').modal({show:true});
          });
        });
      });
  
   </script>
   
</body>
</html>