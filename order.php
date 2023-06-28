<?php
include '../dbconn.php'; // Include your database connection file

// Initialize variables
$order_date = $company = $owner = $item = $quantity = $weight = $request_for_shipment = $tracking_id = $shipment_size = $box_count = $specification = $checklist_quantity = '';
$errors = array();

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $order_date = $_POST['order_date'];
    $company = $_POST['company'];
    $owner = $_POST['owner'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $request_for_shipment = $_POST['request_for_shipment'];
    $tracking_id = $_POST['tracking_id'];
    $shipment_size = $_POST['shipment_size'];
    $box_count = $_POST['box_count'];
    $specification = $_POST['specification'];
    $checklist_quantity = $_POST['checklist_quantity'];

    // Validate form fields
    if (empty($order_date)) {
        $errors[] = 'Order Date is required.';
    }
    // Add more validation rules for other fields as per your requirements

    // If there are no errors, insert data into the database
    if (empty($errors)) {
        $sql = "INSERT INTO orders (order_date, company, owner, item, quantity, weight, request_for_shipment, tracking_id, shipment_size, box_count, specification, checklist_quantity) 
            VALUES ('$order_date', '$company', '$owner', '$item', '$quantity', '$weight', '$request_for_shipment', '$tracking_id', '$shipment_size', '$box_count', '$specification', '$checklist_quantity')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Data inserted successfully');</script>";
        } else {
            $errorMessage = "Error: " . mysqli_error($con);
            echo "<script>alert('$errorMessage');</script>";
        }

        // Clear form inputs
        $order_date = $company = $owner = $item = $quantity = $weight = $request_for_shipment = $tracking_id = $shipment_size = $box_count = $specification = $checklist_quantity = '';
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin:3rem">
    <ul class="nav">
            <li class="nav-item"><a class="btn btn-danger" href="logout.php">Logout</a></li>
        </ul>
        <h1>Order Form</h1>
      
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="order_date" class="form-label">Order Date:</label>
                <input type="date" class="form-control" name="order_date" value="<?php echo $order_date; ?>">
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company:</label>
                <input type="text" class="form-control" name="company" value="<?php echo $company; ?>">
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Owner:</label>
                <input type="text" class="form-control" name="owner" value="<?php echo $owner; ?>">
            </div>
            <div class="mb-3">
                <label for="item" class="form-label">Item:</label>
                <input type="text" class="form-control" name="item" value="<?php echo $item; ?>">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight:</label>
                <input type="number" step="0.01" class="form-control" name="weight" value="<?php echo $weight; ?>">
            </div>
            <div class="mb-3">
                <label for="request_for_shipment" class="form-label">Request for Shipment:</label>
                <input type="text" class="form-control" name="request_for_shipment" value="<?php echo $request_for_shipment; ?>">
            </div>
            <div class="mb-3">
                <label for="tracking_id" class="form-label">Tracking ID:</label>
                <input type="text" class="form-control" name="tracking_id" value="<?php echo $tracking_id; ?>">
            </div>
            <div class="mb-3">
                <label for="shipment_size" class="form-label">Shipment Size:</label>
                <input type="text" class="form-control" name="shipment_size" value="<?php echo $shipment_size; ?>">
            </div>
            <div class="mb-3">
                <label for="box_count" class="form-label">Box Count:</label>
                <input type="number" class="form-control" name="box_count" value="<?php echo $box_count; ?>">
            </div>
            <div class="mb-3">
                <label for="specification" class="form-label">Specification:</label>
                <input type="text" class="form-control" name="specification" value="<?php echo $specification; ?>">
            </div>
            <div class="mb-3">
                <label for="checklist_quantity" class="form-label">Checklist Quantity:</label>
                <input type="text" class="form-control" name="checklist_quantity" value="<?php echo $checklist_quantity; ?>">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>