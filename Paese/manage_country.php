<?php
include "./database/conn.php";

$sql = "SELECT nome FROM paese";
$result = $conn->query($sql);
?>

<h1>Country</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Modify</th>
        <th>Delete</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
            echo "<td><a href='./Paese/modify_country.php?nome=" . urlencode($row["nome"]) . "'>Modify</a></td>";
            echo "<td><a href='./Paese/delete_country.php?nome=" . urlencode($row["nome"]) . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No countries found</td></tr>";
    }
    ?>
</table>

<?php $conn->close(); ?>