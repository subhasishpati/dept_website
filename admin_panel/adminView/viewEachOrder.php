
<?php
include "../config/dbconnect.php";

// Retrieve the complaint ID from the URL parameter
$ID = $_GET['id'];

// Fetch the complaint details from the database
$query = "SELECT * FROM complains WHERE sl_no = $ID";
$result = mysqli_query($conn, $query);
$complaint = mysqli_fetch_assoc($result);

// Fetch the list of dealers from the database
$dealerQuery = "SELECT dealer_id FROM dealers";
    $dealerResult = mysqli_query($conn, $dealerQuery);
$options = "";
while ($row = $dealerResult->fetch_assoc()) {
    $optionValue = $row['dealer_id'];
    $options .= "<option value=\"$optionValue\">$optionValue</option>";
}


?>
<div class="container">
  
    <thead>
      <!-- <tr>
        <th>SG Id</th>
        <th>Complaint Description</th>
        <th>Remark by Admin</th>
        <th>Remarks</th>
      </tr> -->
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_GET['id'];
    $sql = "SELECT * FROM complains WHERE sl_no = $ID";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      
      ?>
      
        
        <form action="./adminView/saveRemarks.php" method="post">
        <div class="form-group">
                <label for="userid">USER ID:</label>
                <input type="text" class="form-control" id="userid" name="userid"
                    value="<?= $complaint['userid'] ?? ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="sgid">SGID:</label>
                <input type="text" class="form-control" id="sgid" name="sgid" value="<?= $complaint['sgid'] ?? ''; ?>"
                    readonly>
            </div>

            <div class="form-group">
                <label for="subject">COMPLAINT DESCRIPTION:</label>
                <input type="text" class="form-control" id="subject" name="subject"
                    value="<?= $complaint['subject'] ?? ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" class="form-control" id="section" name="section"
                    value="<?= $complaint['section'] ?? ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="division">Division:</label>
                <input type="text" class="form-control" id="division" name="division"
                    value="<?= $complaint['division'] ?? ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="dealer">Dealer:</label>
                <select class="form-control" id="forward" name="forward" required>
                <option value="selectL">--Select--</option>
                <?php echo $options; ?>
                </select>
            </div>

            <div class="form-group">
              <textarea class="form-control" id="remarks" name="remark" ></textarea>
            </div>
            <input type="hidden" id="slNoInput" name="sl_no" value="<?= $row["sl_no"] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        
      
    <?php
    } else {
      echo "Error";
    }
    ?>
  
</div>
<script>
  $(document).ready(function() {
    // Handle form submission
    $('#remarkForm').on('submit', function(event) {
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: 'saveRemarks.php',
        data: formData,
        success: function(response) {
          alert(response); // Display the response as a pop-up/alert
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
    
  });
</script>

