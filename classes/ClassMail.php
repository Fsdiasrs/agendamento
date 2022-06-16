<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ClassMail{

    private $mail;

    public function __construct()
    {
        $this->mail=new PHPMailer();
    }

    #Envio de email
    public function sendMail($email, $nome, $token=null, $assunto, $corpoEmail)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            $this->mail->isSMTP();                                            
            $this->mail->Host       = HOSTMAIL;                     
            $this->mail->SMTPAuth   = true;                                
            $this->mail->Username   = USERMAIL;                     
            $this->mail->Password   = PASSMAIL;                               
            $this->mail->SMTPSecure = 'tls';          
            $this->mail->Port       = 587;                                    
        
            //Recipients
            $this->mail->setFrom('husfp@ucpel.edu.br', 'Hospital Universitário São Francisco de Paula');
            $this->mail->addAddress($email, $nome);     
                            
            //Content
            $this->mail->isHTML(true);    
            $this->mail->CharSet = "utf-8";                              
            $this->mail->Subject = $assunto;
            $this->mail->Body    = $corpoEmail;
           
        
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}