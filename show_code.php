<?php
require_once 'connect.php'; // Include the connection file

// Get the ID from the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to retrieve data based on the ID
    $sql = "SELECT * FROM clipboard WHERE Id = $id";
    $result = $conn->query($sql);

    // Check if there is a row with the given ID
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $content = $row['Content'];
    } else {
        echo "No data found for ID: $id";
        exit;
    }
} else {
    echo "No ID provided";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Show Code</title>
</head>

<body>
    <div class="container mt-5 bg-success">
        <div class="raw bg-dark">
            <h2 class="text-white text-center">Code Data</h2>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $content; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="raw pt-2 pb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">About Developer</h5>
                <p class="card-text">Developed By Uttam Jethva</p>
                <p class="card-text">Uttamjethva77@gmail.com</p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
