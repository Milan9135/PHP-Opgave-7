<?php

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "winkel1";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected, to $database";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$producten = $conn->query("SELECT * FROM producten")->fetchAll();

$ids = $conn->query("SELECT product_code FROM producten")->fetchAll();

if (isset($_POST['knopje'])) {
    session_start();

    $_SESSION['naam'] = $_POST['naam'];
    $_SESSION['email'] = $_POST['email'];

    $_SESSION['ID'] = $ids;

    header('Location:variabele.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Product_code</th>
            <th>Product_naam</th>
            <th>Prijs_per_stuk</th>
            <th>Omschrijving</th>
        </tr>
        <?php foreach ($producten as $row) { ?>
            <tr>
                <td><?php echo ($row['product_code']); ?></td>
                <td><?php echo ($row['product_naam']); ?></td>
                <td><?php echo ($row['prijs_per_stuk']); ?></td>
                <td><?php echo ($row['omschrijving']); ?></td>
            </tr>
        <?php } ?>
    </table>
    <form method="POST">
        <input type="text" name="naam">
        <input type="email" name="email">
        <input type="submit" name="knopje">
    </form>
</body>

</html>