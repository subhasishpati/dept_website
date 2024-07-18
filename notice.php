<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    </link>
</head>

<body>


    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dept_website";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>


    <?php

    $sql = "SELECT title, file_path FROM notices ORDER BY date DESC LIMIT 6";
    $result = $conn->query($sql);

    // Create an array to store the PDF links
    $links = [];

    // Loop through the results and store the links in the array
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $filename = $row['title'];
            $pdf_data = $row['file_path'];

            // Generate a unique identifier for the PDF
            $pdf_identifier = uniqid();

            // Generate the URL for the PDF file
            $pdf_file_url = 'pdf.php?file=' . urlencode($pdf_identifier); // Update with the actual URL path
    
            $link = '<li><a href="' . $pdf_file_url . '" target="_blank">' . $filename . '</a></li>';
            $links[] = $link;

            // Store the PDF data in a session variable for retrieval in the PDF file
            $_SESSION[$pdf_identifier] = $pdf_data;
        }
    } else {
        echo "Query execution failed: " . mysqli_error($connection);
    }

    // Close the database connection
// mysqli_close($connection);
    ?>

    <div class="containernb">
        <div class="nbcal">
            <div class="text">
            </div>
            <div class="box">

                <marquee class="mar" direction="up" onmouseover="stop()" onmouseout="start()">
                    <ul>
                        <?php
                        // Display the links in the notice board
                        foreach ($links as $link) {
                            echo $link;
                        }
                        ?>
                    </ul>
                </marquee>
            </div>
        </div>

    </div>





    </div>

</body>

</html>