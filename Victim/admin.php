<?php

$data = json_decode(file_get_contents('data.json'), true);
if (!is_array($data)) {
    $data = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="admin-panel">
        <h1>Admin Panel</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $entry): ?>
                    <tr>
                        <td><?php echo $entry['author']; ?></td>
                        <td><?php echo $entry['content']; ?></td>
                        <td><?php echo $entry['date']; ?></td>
                        <td><a href="delete.php?content=<?php echo $entry['content']; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>