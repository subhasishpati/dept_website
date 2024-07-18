

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SG Id</th>
        <th>Complaint Description</th>
        <th>Remark by Admin</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_GET['id'];
    $sql = "SELECT * FROM complains WHERE sl_no = $ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      ?>
      <tr>
        <td><?= $row["sgid"] ?></td>
        <td><?= $row["subject"] ?></td>
        <td><?= $row["remarkbyAdmin"] ?></td>
        <td>
        <form action="./adminView/saveRemarks.php" method="post">
            <div class="form-group">
              <textarea class="form-control" id="remarks" name="remark" rows="3"></textarea>
            </div>
            <input type="hidden" id="slNoInput" name="sl_no" value="<?= $row["sl_no"] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </td>
      </tr>
    <?php
    } else {
      echo "Error";
    }
    ?>
  </table>
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

