<?php
include "./database/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome'])) {
    $paesi = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO paese (nome) VALUES (?)");
    $stmt->bind_param("s", $paesi);

    if ($stmt->execute()) {
        header("Location: /");
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>
<h1>Insert Country</h1>
<form method="post">
    <label for="nome">Country:</label>
    <input type="text" id="nome" name="nome" required>
    <input type="submit" value="Inserisci">
</form>