<?php

namespace App\lib;
use DB ;
use \Crypt;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Jobs\SendingMails;




class Mai
{
   public static function sender($content,$to){
  
try{
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "docsensa23@gmail.com"; // GMAIL username
    $mail->Password = "admin2019"; // GMAIL password
    //Typical mail data
   $mail->IsHTML(true);
   $mail->AddAddress($to);
   $mail->SetFrom("docsensa23@gmail.com");
   $mail->Subject = "Edocs";
   $mail->Body = $content;
    $mail->Send();
    return(1) ;
    
} catch (phpmailerException $e) {
 return(0); //Pretty error messages from PHPMailer
} catch (Exception $e) {
   return(0); //Boring error messages from anything else!
}
    
   }
    
    public static function sendMailUsers($content,$to){
        //  SendingMails::dispatch("ayoub.zaabali@gmail.com","Do you need help ?");
        Mai::sender($content,$to);

    }


    
}
