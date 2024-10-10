<?php 

include('includes/connect.php');
    

?>




<?php
require_once('TCPDF-main/tcpdf.php'); // Include the TCPDF library


// Fetch payment data
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).



// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin');
$pdf->SetTitle('Store Report');
$pdf->SetSubject('Store Report');

// Set default header data
$pdf->SetHeaderData('', 0, 'AD Store Daily Report', 'Admin PDF Report');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

// Fetch total number of products and remaining items
$product_query = "SELECT product_title, item_available FROM product";
$product_result = mysqli_query($con, $product_query);

// Fetch total registered users
$user_query = "SELECT COUNT(*) as total_users FROM user_table";
$user_result = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

// Fetch total orders and revenue
$order_query = "SELECT user_name, product_title, quantity, price FROM orders";
$order_result = mysqli_query($con, $order_query);

$total_revenue = 0;

// Write the content in the PDF
$html = '<h3>Store Report</h3>';
$html .= '<p>Total Registered Users: ' . $total_users . '</p>';
$html .= '<h4>Product List</h4>';
$html .= '<table border="1" cellspacing="3" cellpadding="4">
            <tr>
                <th>Product Title</th>
                <th>Remaining items available</th>
            </tr>';

while ($row = mysqli_fetch_assoc($product_result)) {
    $html .= '<tr>
                <td>' . $row['product_title'] . '</td>
                <td>' . $row['item_available'] . '</td>
            </tr>';
}

$html .= '</table>';

// Fetching and displaying ordered product information
$html .= '<h4>Order Details</h4>';
$html .= '<table border="1" cellspacing="3" cellpadding="4">
            <tr>
                <th>User Name</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>

            </tr>';

while ($row = mysqli_fetch_assoc($order_result)) {
    $html .= '<tr>
                <td>' . $row['user_name'] . '</td>
                <td>' . $row['product_title'] . '</td>
                <td>' . $row['quantity'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['price'] * $row['quantity'] . '</td>
            </tr>';

    $total_revenue += $row['price'] * $row['quantity'];
}

$html .= '</table>';
$html .= '<p>Total Revenue: ' . $total_revenue . '</p>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('store_report.pdf', 'I');
?>
