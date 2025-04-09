<?php
$host = 'localhost';
$dbname = 'base';
$user = 'admin';
$pass = 'P@ssword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM key_value_store");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['key']); ?></td>
                <td><?php echo htmlspecialchars($row['value']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
