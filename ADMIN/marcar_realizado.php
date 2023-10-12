<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'finca - mi paraiso';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recordatorio_id"])) {
    $recordatorio_id = $_POST["recordatorio_id"];

    $sql = "UPDATE Recordatorios SET Estado = 'Realizado' WHERE ID = :recordatorio_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':recordatorio_id', $recordatorio_id);

    if ($stmt->execute()) {
        // Redirigir a la página principal o actualizar la vista con JavaScript
        header("Location: index.php");
        exit;
    }
}
?>
