<?php
// Include TCPDF library
include('includes/connect.php');
require_once('TCPDF-main/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Order Report');
$pdf->SetSubject('PDF Report');
$pdf->SetKeywords('PDF, report, order');

// Set default header data
$pdf->SetHeaderData('', 0, 'Order Details', 'Generated by Admin');

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Fetch order details from the database
$order_id = $_GET['order_id']; // Assuming you are passing order_id through GET
$query = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $user_name = $row['user_name'];
    $user_address = $row['address'];
    $user_postcode = $row['postcode'];
    $user_phone = $row['user_phone'];
    $user_email = $row['user_email'];
    $order_date = $row['date'];
    $amount_due = $row['price'];
    $product_title = $row['product_title'];
    $quantity = $row['quantity'];

    // HTML content for the PDF
    $html = '
    <h1>Order Report</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>Name:</th>
            <td>' . $user_name . '</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>' . $user_address . '</td>
        </tr>
        <tr>
            <th>Postcode:</th>
            <td>' . $user_postcode . '</td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td>' . $user_phone . '</td>
        </tr>
        <tr>
            <th>Email Address:</th>
            <td>' . $user_email . '</td>
        </tr>
        <tr>
            <th>Order Date:</th>
            <td>' . $order_date . '</td>
        </tr>
        <tr>
            <th>Amount Due:</th>
            <td>' . number_format($amount_due, 2) . ' $</td>
        </tr>
        <tr>
            <th>Product Title:</th>
            <td>' . $product_title . '</td>
        </tr>
        <tr>
            <th>Quantity:</th>
            <td>' . $quantity . '</td>
        </tr>
    </table>
    ';

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
}

// Close and output PDF document
$pdf->Output('order_report.pdf', 'D');

?>
