<?php
defined('APP_RUNNING') or die('Cannot access script directly');

use Snipworks\Smtp\Email;
require 'vendor/autoload.php';
require 'config.php';

class EmailSender 
{
    private $senderName;
    private $senderEmail;
    private $senderMessage;
    private $mail;

    public function __construct()
    {
        $this->senderName = $this->filterInputs('name', FILTER_SANITIZE_STRING);
        $this->senderEmail = $this->filterInputs('email', FILTER_VALIDATE_EMAIL);
        $this->senderMessage = $this->filterMessage();
        $this->mail = new Email(SMTP_SERVER, SMTP_PORT);
    }

    public function setupEmail()
    {
        $this->mail->setProtocol(EMAIL::TLS)
                   ->setLogin(SMTP_USERNAME, SMTP_PASSWORD)
                   ->addTo(TO_EMAIL, TO_NAME)
                   ->setFrom(FROM_EMAIL, FROM_NAME)
                   ->setSubject(EMAIL_SUBJECT)
                   ->setHtmlMessage( $this->getView() );

        return $this;
    }

    public function sendEmail()
    {
        if($this->mail->send())
            return 'Success!';
        else 
            return 'An error occurred.';
        
    }
    
    private function getView()
    {
        $data = [
            'name' =>  $this->senderName,
            'email' => $this->senderEmail,
            'message' => $this->senderMessage,
        ];

        ob_start();
        include('EmailView.php');
        return ob_get_clean();
    }

    private function filterInputs($input, $filter)
    {
        return isset($_POST[$input]) ? filter_input(INPUT_POST, $input, $filter) : '';    
    }

    private function filterMessage()
    {
        return isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    }
}