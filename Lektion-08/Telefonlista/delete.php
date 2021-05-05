<?php

require_once 'database.php';
require_once 'header.php';

if (isset($_GET['id'])) {

    // Hämta id från querysträngen
    $id = htmlspecialchars($_GET['id']);

    // Förbered en SQL-sats
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Kör SQL-satsen
    $stmt->execute();

    echo "<p  class='alert alert-success'>" . $stmt->rowCount() . " record deleted!</p>";
}

require_once 'footer.php';
