<?php
include "../database/conn.php";

if (isset($_GET['nome'])) {
    $nome = urldecode($_GET['nome']);

    $stmt = $conn->prepare("DELETE FROM paese WHERE nome = ?");
    $stmt->bind_param("s", $nome);

    if ($stmt->execute()) {
        echo "Country deleted successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
    header("Location: /");
    exit();
}

$conn->close();
