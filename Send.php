<?php
define('APP_RUNNING', true);

if($_SERVER['REQUEST_METHOD'] !== 'POST' || !file_exists('EmailSender.php') ){
    die('Erorr running script!');
}


require 'EmailSender.php';
echo (new EmailSender())->setupEmail()->sendEmail();