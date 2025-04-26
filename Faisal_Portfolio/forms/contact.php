<?php
// Set your email here
$to = "ariffaisal14650@gmail.com";

// Get form data safely
$name = strip_tags(trim($_POST["name"]));
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$subject = strip_tags(trim($_POST["subject"]));
$message = trim($_POST["message"]);

// Validate fields
if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
    http_response_code(400);
    echo "Please complete the form correctly.";
    exit;
}

// Email content
$email_content = "You have received a new message from your website:\n\n";
$email_content .= "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Subject: $subject\n\n";
$email_content .= "Message:\n$message\n";

// Email headers
$headers = "From: $name <$email>";

// Send the email
if (mail($to, $subject, $email_content, $headers)) {
    echo "OK";
} else {
    http_response_code(500);
    echo "Something went wrong. Please try again later.";
}
?>
