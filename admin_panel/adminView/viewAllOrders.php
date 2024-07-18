

<div id="ordersBtn" >
  <h2 style="color:#002D72">Assigned Complaints </h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.No.</th>
        <th>User Id</th>
        <th>SG Id</th>
        <th>Complain Description</th>
        <th>name</th>        
        <th>complain Status</th>
     </tr>
    </thead>
     <?php
    //  error_reporting(E_ERROR | E_PARSE);
      include "../config/dbconnect.php";
      $fetchs =  $_SESSION['user_id'];
      $serialNo = 1;

      $sql="SELECT * from complains WHERE status = 'pending' ";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
         
          
    ?>
       <tr>
       <td><?php echo $serialNo; ?></td>
          <td><?=$row["userid"]?></td>
          <td><?=$row["sgid"]?></td>
          <td><?=$row["subject"]?></td>
          <td><?=$row["name"]?></td>
         
          
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?id=<?=$row['sl_no']?>" href="javascript:void(0);">view</a></td>
        
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
          
          <h4 class="modal-title">Complaint Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>      
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
     $(document).ready(function() {
  // This code runs when the document (HTML) has finished loading

  $(document).on('click', '.openPopup', function(event) {
    event.preventDefault(); // Prevent default link behavior

    var dataURL = $(this).data('href');

    $.get(dataURL, function(data) {
      $('.order-view-modal').html(data);
      $('#viewModal').modal('show');
    });
  });

  
});

 </script>