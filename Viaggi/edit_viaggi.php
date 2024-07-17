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
}
$stmd->close();

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT numero_posti_disponibili, paese_1, paese_2, paese_3, paese_4 FROM Viaggi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numero_posti_disponibili, $paese_1, $paese_2, $paese_3, $paese_4);
$stmt->fetch();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_posti_disponibili = $_POST['numero_posti_disponibili'];
    $paese_1 = $_POST['paese_1'] ?: null;
    $paese_2 = $_POST['paese_2'] ?: null;
    $paese_3 = $_POST['paese_3'] ?: null;
    $paese_4 = $_POST['paese_4'] ?: null;

    $stmt = $conn->prepare("UPDATE Viaggi SET numero_posti_disponibili = ?, paese_1 = ?, paese_2 = ?, paese_3 = ?, paese_4 = ? WHERE id = ?");
    $stmt->bind_param("issssi", $numero_posti_disponibili, $paese_1, $paese_2, $paese_3, $paese_4, $id);

    if ($stmt->execute()) {
        header("Location: /");
        exit();
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
    <title>Edit Viaggi</title>
</head>

<body>
    <h1>Edit Viaggi</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>">
        <label for="numero_posti_disponibili">Numero Posti Disponibili:</label>
        <input type="number" id="numero_posti_disponibili" name="numero_posti_disponibili" value="<?php echo $numero_posti_disponibili; ?>" required>
        <br><br>

        <label for="paese_1">Country 1:</label>
        <select id="paese_1" name="paese_1">
            <option value="">Select Country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>" <?php if ($country == $paese_1) echo 'selected'; ?>><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_2">Country 2:</label>
        <select id="paese_2" name="paese_2">
            <option value="">Select Country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>" <?php if ($country == $paese_2) echo 'selected'; ?>><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_3">Country 3:</label>
        <select id="paese_3" name="paese_3">
            <option value="">Select Country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>" <?php if ($country == $paese_3) echo 'selected'; ?>><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="paese_4">Country 4:</label>
        <select id="paese_4" name="paese_4">
            <option value="">Select Country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country; ?>" <?php if ($country == $paese_4) echo 'selected'; ?>><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <input type="submit" value="Update">
    </form>
    <a href="/">Back to Home</a>
</body>

</html>