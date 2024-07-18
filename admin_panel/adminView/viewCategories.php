<style>
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    position: relative;
  }

  .close {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
  }

  .close:hover,
  .close:focus {
    color: #555;
  }
</style>

<div>
  <h3 style="color:#002D72">Remark from Dealers</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Dealer Name</th>
        <th class="text-center">SG id</th>
        <th class="text-center">Complaint Description</th>
        <th class="text-center" colspan="1.5">Remark</th>
        <th class="text-center" colspan="1.5">Status</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM complains";
    $result = $conn->query($sql);
    $count = 1;

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if (!empty($row["remarkbyDealer"])) {
    ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["forwardTo"] ?></td>
            <td><?= $row["sgid"] ?></td>
            <td><?= $row["subject"] ?></td>
            <td><?= $row["remarkbyDealer"] ?></td>

            <td>
              <?php if ($row["status"] === 'Resolved'): ?>
                <button type="button" class="btn btn-primary resolve-btn" disabled>
                  Resolved
                </button>
              <?php else: ?>
                <button type="button" class="btn btn-primary resolve-btn" data-sgid="<?= $row["sgid"] ?>">
                  Resolve
                </button>
              <?php endif; ?>
            </td>
          </tr>
    <?php
          $count++;
        }
      }
    } else {
      echo "No rows found.";
    }
    ?>
  </table>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Confirmation</h2>
      <p>Are you sure you want to resolve this complaint?</p>
      <button id="confirmBtn">Confirm</button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.resolve-btn').click(function() {
        var button = $(this);
        var sgid = button.data('sgid');

        // Open the modal
        $('#myModal').css('display', 'block');

        // Handle confirmation button click
        $('#confirmBtn').click(function() {
          // Make AJAX request to update the status
          $.ajax({
            url: './controller/updateStatus.php', // Replace with the correct path to updateStatus.php
            type: 'POST',
            data: {
              sgid: sgid
            },
            success: function(response) {
              // Update the button text and disable the button
              button.text('Resolved');
              button.attr('disabled', true);
            },
            error: function() {
              alert('Error occurred. Please try again.');
            }
          });

          // Hide the modal
          $('#myModal').css('display', 'none');
        });
      });

      // Close the modal when the close button is clicked
      $('.close').click(function() {
        $('#myModal').css('display', 'none');
      });
    });
  </script>
</div>
