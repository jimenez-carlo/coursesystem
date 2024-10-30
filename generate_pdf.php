<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header() {
        // Set font for the small size header
        $this->SetFont('Arial', '', 10);
        
        // Combine lines into a compact format
        $this->Cell(0, 9, 'Republic of the Philippines', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 1, 'PANGASINAN STATE UNIVERSITY', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 7, 'BAYAMBANG CAMPUS', 0, 1, 'C');
        
        // No additional line spacing, just continue
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 2, 'COLLEGE OF ARTS, SCIENCE AND TECHNOLOGY', 0, 1, 'C');
        $this->Cell(0, 7, 'INFORMATION TECHNOLOGY DEPARTMENT', 0, 1, 'C');
    
        // Set font for the small size header
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 1, 'Bayambang, Pangasinan', 0, 0, 'C');
    
        // Add a blank line
        $this->Ln(10); // Adds a blank line between sections
    
        // Set font for the bold, larger size header
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 3, 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY NEW CURRICULUM', 0, 1, 'C');
        $this->Cell(0, 7, 'Concentration: Web and Mobile Technologies', 0, 1, 'C');
        
        // Set font for the small size header
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'SY: ________ to ________', 0, 1, 'C');

        // Add a blank line
        $this->Ln(10); // Adds a blank line between sections
    }
    
    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Function to create a table
    function CourseTable($header, $data)
    {
        // Header
        $this->SetFont('Arial', 'B', 12);
        $cellWidths = [30, 30, 80, 20, 30]; // Adjust widths as necessary

        foreach ($header as $index => $col) {
            $this->Cell($cellWidths[$index], 10, $col, 1, 0, 'C');
        }
        $this->Ln();

        // Data
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $index => $col) {
                $this->Cell($cellWidths[$index], 10, $col, 1, 0, 'C'); // Center align
            }
            $this->Ln();
        }
    }
}

// Create instance and output PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Set font for the body
$pdf->SetFont('Times', '', 12);

// Course data array (you can replace this with dynamic data)
$data = [
    ['1.0', 'CC 105', 'Information Management 1', '2/1', 'CC 104'],
    ['1.25', 'CC 106', 'Information Management 2', '3/1', 'CC 105'],
    ['1.5', 'CC 107', 'Database Management', '3/1', 'CC 106'],
    ['1.75', 'CC 108', 'Web Development', '3/1', 'CC 107'],
    ['1.75', 'CC 108', 'Web Development', '3/1', 'CC 107'],
    // Add more rows as needed
];

// Table header
$header = ['Grade', 'Course Code', 'Course Title', 'Unit', 'Pre-requisite'];

// Create the table
$pdf->CourseTable($header, $data);

// Output the PDF
$pdf->Output();
?>
