<?php
    namespace Classes;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class ClassMail{

        private $mail;

        public function __construct()
        {
            $this->mail                                         = new PHPMailer();
        }

        #Envio de email
        public function sendMail($email,  $nome, $token=null, $assunto, $corpoEmail)
        {
            try {
                $this->mail->isSMTP();                                              //Send using SMTP
                $this->mail->Host                               = HOSTNAME;                                //Set the SMTP server to send through
                $this->mail->SMTPAuth                           = true;                                    //Enable SMTP authentication
                $this->mail->Username                           = USERMAIL;                                //SMTP username
                $this->mail->Password                           = PASSMAIL;                               //SMTP password
                $this->mail->SMTPSecure                         = 'tls';            //Enable implicit TLS encryption
                $this->mail->Port                               = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $this->mail->CharSet                            = 'utf-8';
                $this->mail->SMTPOptions                        = array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                        "allow_self_signed"=>true
                    )
                );

                //Recipients
                $this->mail->setFrom('husfp@ucpel.edu.br', 'HUSFP');
                $this->mail->addAddress($email, $nome);     //Add a recipient
                
                //Content
                $this->mail->isHTML(true);                                  //Set email format to HTML
                $this->mail->Subject                            = $assunto;
                $this->mail->Body                               = $corpoEmail;

                $this->mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error   : {$this->mail->ErrorInfo}";
            }
        }
    }

?>