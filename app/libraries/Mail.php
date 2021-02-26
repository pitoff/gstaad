<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class Mail
{
    public $mail;
    public $receiver;
    public $subject;
    public $body;

    public function __construct()
    {
        //Instantiation and passing `true` enables exceptions
        $this->mail = new PHPMailer();
    }

   public function sendemail()
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'mail.seagullshipmentbd.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'pit@seagullshipmentbd.com';                     //SMTP username
            $this->mail->Password   = '123@#$';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->mail->setFrom('pit@seagullshipmentbd.com', SITENAME);
            $this->mail->addAddress($this->receiver);               //Name is optional

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;

            $send = $this->mail->send();

            if (!$send) {
                return false;
            }return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->phpmail->ErrorInfo}";
        }
    }

    public function template(){
        ob_start();
        require_once APPROOT . '/view/email/message' . '.php';
        return ob_get_clean();
    }

    public function inject($template, $sitetitle, $caption, $email, $body, $link)
    {
        $template = str_replace('[site_title]', $sitetitle, $template);
        $template = str_replace('[caption]', $caption, $template);
        $template = str_replace('[email]', $email, $template);
        $template = str_replace('[body]', $body, $template);
        $template = str_replace('[site_title]', $sitetitle, $template);
        $template = str_replace('[link]', $link, $template);

        return $template;
    }
}
