<?php
session_start();

if (isset($_GET['file'])) {
    $pdf_identifier = $_GET['file'];
    if (isset($_SESSION[$pdf_identifier])) {
        $pdf_data = $_SESSION[$pdf_identifier];

        // Set appropriate headers to display the PDF file
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');

        // Output the PDF data
        echo $pdf_data;
        exit();
    }
}

// Invalid file identifier or PDF data not found
echo "Invalid file identifier or PDF data not found.";
?>