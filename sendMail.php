<?php

require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$apiKey = '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';

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Test subject");
$email->addTo("mark.chang@hkmci.com", "Mark");
$email->addContent(
    "text/html", "<strong>This is HTML content</strong>"
);
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}