<?php
include "../config/dbconnect.php";

// Retrieve the complaint ID from the URL parameter
$complaintId = $_GET['id'];

// Fetch the complaint details from the database
$query = "SELECT * FROM complains WHERE sgid='$complaintId'";
$result = mysqli_query($conn, $query);
$complaint = mysqli_fetch_assoc($result);

// Fetch the list of dealers from the database
$dealerQuery = "SELECT dealer_id FROM dealers";
$dealerResult = mysqli_query($conn, $dealerQuery);

// Process the form submission
if (isset($_POST['submit'])) {
    // Retrieve form field values
    $remark = $_POST['remark'];
    $dealer = $_POST['dealer'];

    // Update the complaint record in the database
    $updateQuery = "UPDATE complains SET remarkbyAdmin='$remark', forwardTo='$dealer', status='under-process' WHERE sgid='$complaintId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect to success page
       
        exit();
    } else {
        echo "Something went wrong: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">

    <title>USER DATA</title>
</head>
<body>

<div class="container mt-3">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="userid">USER ID:</label>
            <input type="text" class="form-control" id="userid" name="userid" value="<?= $complaint['userid'] ?? ''; ?>"
                   readonly>
        </div>

        <div class="form-group">
            <label for="sgid">SGI:</label>
            <input type="text" class="form-control" id="sgid" name="sgid" value="<?= $complaint['sgid'] ?? ''; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="subject">COMPLAINT DESCRIPTION:</label>
            <input type="text" class="form-control" id="subject" name="subject"
                   value="<?= $complaint['subject'] ?? ''; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="section">Section:</label>
            <input type="text" class="form-control" id="section" name="section" value="<?= $complaint['section'] ?? ''; ?>"
                   readonly>
        </div>

        <div class="form-group">
            <label for="division">Division:</label>
            <input type="text" class="form-control" id="division" name="division"
                   value="<?= $complaint['division'] ?? ''; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="dealer">Dealer:</label>
            <select class="form-control" id="dealer" name="dealer">
                <?php while ($row = mysqli_fetch_assoc($dealerResult)) : ?>
                    <option value="<?= $row['dealer_id']; ?>" <?= ($row['dealer_id'] === $complaint['forwardTo']) ? 'selected' : ''; ?>>
                        <?= $row['dealer_id']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="remark">REMARK:</label>
            <textarea type="text" class="form-control" id="remark" name="remark" rows="7"
                      placeholder="Write your remark.."><?= $complaint['remark'] ?? ''; ?></textarea>
        </div>

       <div style="display:flex;">
       <div class="column">
            <div class="col-6">
                <button class="btn btn-primary" type="submit" name="submit">Forward</button>


               
            </div>
        </div>
        <div class="column">
            <div class="col-6">
              <button type="button" class="btn btn-primary resolve-btn" data-sgid="<?= $row["sgid"] ?>" data-status="<?= $row["status"] ?>">
                <?= $row["status"] ?>
              </button>
            
               
            </div>
        </div>
       </div>

    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.resolve-btn').click(function() {
        var button = $(this);
        var sgid = button.data('sgid');
        var currentStatus = button.data('status');

        // Check if the current status is already "Resolved"
        if (currentStatus === 'Resolved') {
          alert('This complaint is already resolved.');
          return;
        }

        // Make AJAX request to update the status
        $.ajax({
          url: './controller/updateStatus.php', // Replace with the correct path to updateStatus.php
          type: 'POST',
          data: {
            sgid: sgid
          },
          success: function(response) {
            // Update the button text and status attribute
            button.text('Resolved');
            button.data('status', 'Resolved');
          },
          error: function() {
            alert('Error occurred. Please try again.');
          }
        });
      });
    });
  </script>
</body>
</html>
