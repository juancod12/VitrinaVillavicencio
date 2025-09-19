<?php
function procesarPagoNequi($phoneNumber, $amount, $reference) {
    $accessToken = "TU_ACCESS_TOKEN"; // Cambia por tu token de Nequi
    $url = "https://sandbox.nequi.com/api/v1/payments"; // Endpoint sandbox

    $data = [
        "amount" => $amount,
        "phoneNumber" => $phoneNumber,
        "reference" => $reference
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Capturar datos del POST si se envió el formulario
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $amount = $_POST['amount'] ?? 0;
    $reference = $_POST['reference'] ?? '';

    if ($phoneNumber && $amount > 0 && $reference) {
        $result = procesarPagoNequi($phoneNumber, $amount, $reference);
    }
}
