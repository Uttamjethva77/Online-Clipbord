<?php
require_once 'connect.php'; // Include the connection file

// SQL query to retrieve all data from the clipboard table
$sql = "SELECT * FROM clipboard";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Initialize an empty array to store the data
    $data = [];

    // Loop through each row and store it in the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Clipboard Data</title>
</head>

<body>
    <div class="container mt-5 bg-success">
        <div class="raw bg-dark">
            <h2 class="text-white text-center">Clipboard Data</h2>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Show Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?php echo $row['Id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><a href="show_code.php?id=<?php echo $row['Id']; ?>" class="btn btn-outline-primary btn-sm">See</a></td>
                        </tr>
                    <?php endforeach; ?>
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
