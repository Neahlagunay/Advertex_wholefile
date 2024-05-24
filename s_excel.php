<?php
include "connection.php";

// Fetch distinct data from the database grouped by the "products" column
$sql = "SELECT products, SUM(quantity) as total_quantity, SUM(total_incoming) as total_incoming, SUM(total_outgoing) as total_outgoing, SUM(ending_quantity) as total_ending
        FROM summary
        GROUP BY products";
$result = $con->query($sql);

if (!$result) {
    die("Invalid query!");
}

// Set headers for Excel download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=summary.xls');
header('Pragma: no-cache');
header('Expires: 0');

// Start HTML table for Excel format
echo '<table border="1">
    <tr>
        <th>MATERIAL</th>
        <th>BEGINNING</th>
        <th>INCOMING</th>
        <th>OUTGOING</th>
        <th>ENDING</th>
    </tr>';

// Loop through grouped data and output rows
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>{$row['products']}</td>
        <td>{$row['total_quantity']}</td>
        <td>{$row['total_incoming']}</td>
        <td>{$row['total_outgoing']}</td>
        <td>{$row['total_ending']}</td>
    </tr>";
}

// Close the table
echo '</table>';

// Close the database connection
mysqli_close($con);
?>
