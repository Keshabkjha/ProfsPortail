<?php

function generate_leave_application($prompt) {
    $api_key = 'Your API Key'; // Replace with your actual Google API key
    $url = 'https://language.googleapis.com/v1/documents:analyzeContent?key=' . $api_key;
    
    // Construct the request body
    $data = array(
        'document' => array(
            'type' => 'PLAIN_TEXT',
            'content' => $prompt
        ),
        'features' => array(
            'extractSyntax' => true,
            'extractEntities' => true,
            'extractDocumentSentiment' => true,
            'extractEntitySentiment' => true,
            'classifyText' => false
        ),
        'encodingType' => 'UTF8'
    );

    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP status code
    curl_close($ch);

    if ($httpcode != 200) {
        // Error occurred, handle it appropriately
        return "Error: Failed to fetch response from Google Generative Language Model API.";
    }

    $response = json_decode($result, true);

    if (!isset($response['sentences'])) {
        // Response does not contain the expected structure, handle it appropriately
        return "Error: Unexpected response format from Google Generative Language Model API.";
    }

    // Extract text from the response and concatenate sentences
    $generated_text = "";
    foreach ($response['sentences'] as $sentence) {
        $generated_text .= $sentence['text']['content'] . " ";
    }

    return $generated_text;
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $email = $_POST['email'];
    $receiver_email = $_POST['receiver_email'];
    $reason = $_POST['reason'];
    $duration = $_POST['duration'];

    // Construct prompt for leave application
    $prompt = "Leave Application\n";
    $prompt .= "From: $email\n";
    $prompt .= "To: $receiver_email\n\n";
    $prompt .= "Reason for Leave: $reason\n";
    $prompt .= "Duration: $duration\n";

    // Generate leave application text
    $generated_leave_application = generate_leave_application($prompt);

    // Output the generated leave application
    echo $generated_leave_application;
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ProfsPortail || Leave Application</title>
    
    <link rel="apple-touch-icon" href="apple-icon.png">
    <!-- Favicon-->
    
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>