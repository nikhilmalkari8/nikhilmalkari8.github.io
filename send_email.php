<?php
require 'vendor/autoload.php';

use SendGrid\Mail\Mail;

// Create a SendGrid client
$sendgrid = new SendGrid('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');

// Create a new email
$email = new Mail();

// Set the email sender and recipient
$email->setFrom('nikhilmalkari6@gmail.com');
$email->addTo('nikhilmalkari6@gmail.com');

// Set the email subject and body
$email->setSubject('New contact form submission');
$email->setBody('Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . $_POST['message']);

// Send the email
$sendgrid->send($email);

// If the email was sent successfully, redirect to the thank you page
if ($sendgrid->getLastResponse()->getStatusCode() === 202) {
    header('Location: thank_you.html');
    exit();
}

// Otherwise, display an error message
echo 'Email sending failed.';
?>
