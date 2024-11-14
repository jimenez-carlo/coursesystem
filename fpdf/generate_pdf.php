<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting for debugging
require('fpdf.php');

// Check if content is set
if (isset($_POST['content'])) {
    $content = $_POST['content'];

    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Add content to PDF
    $pdf->MultiCell(0, 10, $content);

    // Output the PDF to the browser
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="generated.pdf"');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Expires: 0');
    header('Pragma: public');

    ob_clean(); // Clear any output buffer
    flush(); // Flush the system output buffer

    $pdf->Output('I'); // Send the PDF to the browser for inline viewing
} else {
    echo 'No content provided.';
}
?>
