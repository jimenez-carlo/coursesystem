<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Part of Web Page</title>
    <style>
        /* Style for the page content */
        .content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        
        /* Style for the part we want to print */
        .print-section {
            padding: 20px;
            border: 1px dashed #333;
            background-color: #eef;
            margin-bottom: 20px;
        }

        /* Hide the print button when printing */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="content">

        <p>This is the general content of the webpage.</p>

        <div class="print-section" id="print-section">
            <h2>Section to Print</h2>
            <p>This is the part of the content that you want to print.</p>
        </div>

        <button class="no-print" onclick="printPart()">Print This Section</button>
    </div>

    <script>
        function printPart() {
            // Get the content of the print section
            var printContents = document.getElementById('print-section').innerHTML;

            // Open a new window to print from
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            // Print the content
            window.print();

            // Restore the original page content
            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
</body>
</html>