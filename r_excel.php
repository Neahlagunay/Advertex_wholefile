<?php
include "connection.php";

// Fetch data from the database
$sql = "SELECT * FROM requestor";
$result = $con->query($sql);
if (!$result) {
    die("Invalid query!");
}

// Set headers for Excel download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=requestor.xls');
header('Pragma: no-cache');
header('Expires: 0');

// Start HTML table for Excel format
echo '<table border="1">
    <tr>
        <th>NAME</th>
        <th>QUANTITY</th>
        <th>MATERIAL</th>
        <th>DATE</th>
    </tr>';

// Loop through data and output rows
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>{$row['name']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['material']}</td>
        <td>{$row['date']}</td>
    </tr>";
}

// Close the table
echo '</table>';

// Close the database connection
mysqli_close($con);
?>
