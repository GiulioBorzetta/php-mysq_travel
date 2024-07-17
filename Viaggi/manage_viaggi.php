<?php
include "./database/conn.php";

$sql = "SELECT id, numero_posti_disponibili, paese_1, paese_2, paese_3, paese_4 FROM Viaggi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Travel</title>
</head>

<body>
    <h1>Manage Travel</h1>
    <a href="./Viaggi/insert_viaggi.php">Add New Travel</a>
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