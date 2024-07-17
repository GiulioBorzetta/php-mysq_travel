<?php
include "../database/conn.php";


$stmd = $conn->prepare("SELECT nome FROM Paese");
$stmd->execute();
$result = $stmd->get_result();
$countries = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countries[] = $row["nome"];
    }
} else {
    echo "0 results";
}
$stmd->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_posti_disponibili = $_POST['numero_posti_disponibili'];
    $paese_1 = $_POST['paese_1'] ?: null;
    $paese_2 = $_POST['paese_2'] ?: null;
    $paese_3 = $_POST['paese_3'] ?: null;
    $paese_4 = $_POST['paese_4'] ?: null;

    $stmt = $conn->prepare("INSERT INTO Viaggi (numero_posti_disponibili, paese_1, paese_2, paese_3, paese_4) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $numero_posti_disponibili, $paese_1, $paese_2, $paese_3, $paese_4);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: /");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Insert Viaggi</title>
</head>

<body>
    <h1>Insert Travel</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="numero_posti_disponibili">Number of places available:</label>
        <input type="number" id="numero_posti_disponibili" name="numero_posti_disponibili" required>
        <br><br>

        <label for="paese_1">Country 1:</label>
        <select id="paese_1" name="paese_1">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_2">Country 2:</label>
        <select id="paese_2" name="paese_2">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_3">Country 3:</label>
        <select id="paese_3" name="paese_3">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_4">Country 4:</label>
        <select id="paese_4" name="paese_4">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <input type="submit" value="Submit">
    </form>

    <a href="/">Back To Home</a>
</body>

</html>