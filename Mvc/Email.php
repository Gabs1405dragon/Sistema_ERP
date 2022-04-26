<?php  


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email{

    private $mailer;

    public function __construct($host,$username,$senha,$name){
        $this->mailer = new PHPMailer(true);

        //$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $username;
        $this->mailer->Password = $senha;
        $this->mailer->CharSet = "UTF-8";
        $this->mailer->Port = 587;#465
        $this->mailer->setFrom($username,$name);
        $this->mailer->isHTML(true);
      
    }

    public function addAdress($email,$nome){
        $this->mailer->addAddress($email,$nome);
    }

    public function formatarEmail($info){
        $this->mailer->Subject = $info['assunto'];
        $this->mailer->Body = $info['corpo'];
        $this->mailer->AltBody = strip_tags($info['corpo']) ;
    }

 

    public function enviarEmail(){
     
        if($this->mailer->send()){
            return true;
        }else{
            return false;
        }
    }
}

?>