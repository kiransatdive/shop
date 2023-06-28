<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Orders Table</title>
</head>
<body>
    <div class="container">
        <?php
        include '../../shop/dbconn.php'; // Include your database connection file

        // Retrieve data from the "orders" table
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Display the data in a table
            echo "<a class='btn btn-danger' href='logout.php'>Logout</a>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Order ID</th><th>Order Date</th><th>Company</th><th>Owner</th><th>Item</th><th>Quantity</th><th>Weight</th><th>Request for Shipment</th><th>Tracking ID</th><th>Shipment Size</th><th>Box Count</th><th>Specification</th><th>Checklist Quantity</th></tr></thead>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>" . $row['company'] . "</td>";
                echo "<td>" . $row['owner'] . "</td>";
                echo "<td>" . $row['item'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
                echo "<td>" . $row['request_for_shipment'] . "</td>";
                echo "<td>" . $row['tracking_id'] . "</td>";
                echo "<td>" . $row['shipment_size'] . "</td>";
                echo "<td>" . $row['box_count'] . "</td>";
                echo "<td>" . $row['specification'] . "</td>";
                echo "<td>" . $row['checklist_quantity'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No data found.</p>";
        }

        mysqli_close($con); // Close the database connection
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
