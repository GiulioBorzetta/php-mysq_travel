<?php
include "./database/conn.php";

$nome_search = isset($_GET['nome_search']) ? $_GET['nome_search'] : '';
$numero_posti_disponibili_search = isset($_GET['numero_posti_disponibili_search']) ? $_GET['numero_posti_disponibili_search'] : '';

$sql = "SELECT id, numero_posti_disponibili, paese_1, paese_2, paese_3, paese_4 FROM Viaggi WHERE 1=1";

if (!empty($nome_search)) {
    $sql .= " AND (paese_1 LIKE '%$nome_search%' OR paese_2 LIKE '%$nome_search%' OR paese_3 LIKE '%$nome_search%' OR paese_4 LIKE '%$nome_search%')";
}

if (!empty($numero_posti_disponibili_search)) {
    $sql .= " AND numero_posti_disponibili = $numero_posti_disponibili_search";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Project PHP</title>
</head>

<body>
    <h1>Filter</h1>
    <form id="searchForm" method="get">
        <label>Country: </label>
        <input type="text" id="nome_search" name="nome_search" placeholder="Search country" value="<?php echo htmlspecialchars($nome_search); ?>" />
        <label>Number of Seats: </label>
        <input type="number" id="numero_posti_disponibili_search" name="numero_posti_disponibili_search" placeholder="Search seats (only NUM)" value="<?php echo htmlspecialchars($numero_posti_disponibili_search); ?>" />
        <input type="submit" value="Search" />
    </form>

    <h1>Filtered Travel</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Number of places available</th>
            <th>Country 1</th>
            <th>Country 2</th>
            <th>Country 3</th>
            <th>Country 4</th>
            <th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['numero_posti_disponibili']; ?></td>
                    <td><?php echo $row['paese_1']; ?></td>
                    <td><?php echo $row['paese_2']; ?></td>
                    <td><?php echo $row['paese_3']; ?></td>
                    <td><?php echo $row['paese_4']; ?></td>
                    <td>
                        <a href="./Viaggi/edit_viaggi.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="./Viaggi/delete_viaggi.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">No records found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>

<?php
$conn->close();
?>