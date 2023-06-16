<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Verbindung zur SQLite-Datenbank herstellen
$db = new PDO('sqlite:F:/XAMPP/htdocs/Seminar/database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Einträge aus der POST-Anfrage abrufen
$entry1 = $_POST['entry1'];
$entry2 = $_POST['entry2'];

// SQL-Befehl zum Einfügen der Einträge in die Tabelle erstellen und ausführen
$sql = "INSERT INTO entries (field1, field2) VALUES (:entry1, :entry2)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':entry1', $entry1);
$stmt->bindParam(':entry2', $entry2);
$result = $stmt->execute();

// Überprüfen, ob das Einfügen erfolgreich war
if ($result) {
    echo "Einträge erfolgreich hinzugefügt";
} else {
    echo "Fehler beim Hinzufügen der Einträge: " . $stmt->errorInfo()[2];
}

// Datenbankverbindung schließen
$db = null;
?>

