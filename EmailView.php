<?php defined('APP_RUNNING') or die('Cannot access script directly'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Email</title>
</head>
<body>
    <h4>You have received new contact information</h4>
    <p><strong>Name: </strong><?= $this->senderName ?></p>
    <p><strong>Email: </strong><?= $this->senderEmail ?></p>
    <p><strong>Message: </strong><?= $this->senderMessage ?></p>
    <em>Thank you for using our email service!</em>
</body>
</html>