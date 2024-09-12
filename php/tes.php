<?php
header('Content-Type: application/json'); // Set content type jika mengirim JSON

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Debugging: Print all GET parameters
    $allParams = json_encode($_GET);
    error_log("Received GET parameters: " . $allParams);

    // Check if the 'dataStorage' field is present in the GET request
    if (isset($_GET['dataStorage'])) {
        // Get the data from the GET request
        $dataStorage = $_GET['dataStorage'];
        
        // Print the received data
        echo json_encode(["message" => "Data received: " . htmlspecialchars($dataStorage)]);
    } else {
        echo json_encode(["message" => "No data received"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
