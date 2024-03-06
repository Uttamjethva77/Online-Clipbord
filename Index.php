<?php
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["send"])) {
        $title = $_POST["title"];
        $code = $_POST["code"];

        // Insert data into the clipboard table
        $sql = "INSERT INTO clipboard (Name, Content) VALUES ('$title', '$code')";
        if ($conn->query($sql) === TRUE) {
            // Retrieve the last inserted ID
            $id = $conn->insert_id;
            header("Location: {$_SERVER['REQUEST_URI']}?id=$id");
            exit;
        }
    } elseif (isset($_POST["retrieve"])) {
        $id = $_POST["ID"];

        // Retrieve data from the clipboard table
        $select = "SELECT Content FROM clipboard WHERE Id = '$id'";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $retrievedText = $row["Content"];
        }
    }
}

// Check if there is an ID in the URL query parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container bg-success">
        <div class="raw bg-dark">
            <h2 class="text-white text-center">ONLINE CLIPBOARD</h2>
        </div>
        <div class="raw">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Introduction</h5>
                    <p class="card-text">Online Clipboard is free online tool that help you to copy and paste between
                        devices. It allows you to copy text.</p>
                    <h5 class="card-title text-center">How to use</h5>
                    <ol>
                        <li>
                            Choose your text that would be like to be copied to another device by putting your text in the
                            following text box, or just copy your text.
                        </li>
                        <li>
                            Send your text to Online Clipboard by the following button.
                        </li>
                        <li>
                            At the other device, retrieve your text from Online Clipboard by entering your code.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="raw pt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Send to Online Clipboard:</h5>
                    <form method="post" id="sendForm">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="code" placeholder="Code">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success" name="send">Send Above text to Online Clipboard</button>
                            </div>
                        </div>
                    </form>
                    <div class="raw">
                        <div class="text-center" id="getcode">
                            <?php
                            if (isset($id)) {
                                echo "ID to retrieve the text: $id";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="raw pt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Retrieve From Online Clipboard:</h5>
                    <form method="post" id="retrieveForm">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ID" name="ID" placeholder="ID">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success" name="retrieve">Retrieve</button>
                            </div>
                        </div>
                    </form>
                    <div class="raw">
                        <div class="mb-3 pt-3">
                            <input type="text" class="form-control" name="Retrievedtext" id="retrievedText" value="<?php if (isset($retrievedText)) echo $retrievedText; ?>">
                        </div>
                    </div>
                </div>
            </div>
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
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
