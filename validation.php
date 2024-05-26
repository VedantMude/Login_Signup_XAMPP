<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'myapp';

// Create connection
$connection = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = $_POST['exampleInputEmail1'];
    $pass = $_POST['exampleInputPassword1'];

    // Use prepared statements to prevent SQL injection
    $sql = $connection->prepare("SELECT * FROM myusers WHERE email = ? AND pass = ?");
    $sql->bind_param("ss", $email, $pass);
    $sql->execute();
    $result = $sql->get_result();

    

    if ($result->num_rows > 0) {
        header("Location: /myfun/resgistered.php");
        exit;
    } else {
        header("Location: /myfun/index.php");
        exit;
    }
}
?>
