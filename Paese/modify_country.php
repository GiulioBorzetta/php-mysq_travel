<?php
include "../database/conn.php";

if (isset($_GET['nome'])) {
    $nome = urldecode($_GET['nome']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome_vecchio']) && isset($_POST['nome_nuovo'])) {
    $nome_vecchio = $_POST['nome_vecchio'];
    $nome_nuovo = $_POST['nome_nuovo'];

    $stmt = $conn->prepare("UPDATE paese SET nome = ? WHERE nome = ?");
    $stmt->bind_param("ss", $nome_nuovo, $nome_vecchio);

    if ($stmt->execute()) {
        echo "Country updated successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
    header("Location: /");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modify Country</title>
</head>

<body>
    <h1>Modify Country</h1>
    <form method="post">
        <input type="hidden" name="nome_vecchio" value="<?php echo htmlspecialchars($nome); ?>">
        <label for="nome_nuovo">New Country Name:</label>
        <input type="text" id="nome_nuovo" name="nome_nuovo" value="<?php echo htmlspecialchars($nome); ?>" required><br>
        <input type="submit" value="Modify Country">
    </form>
    <a href="/">Back to Home</a>
</body>

</html>