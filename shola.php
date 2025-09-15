<?php
   $name = htmlspecialchars($_REQUEST['name']);
   $email = htmlspecialchars($_REQUEST['email']);
   $message = htmlspecialchars($_REQUEST['message']);

   require 'vendor/autoload.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   $mail =new PHPMailer(true);
   try{
    $mail ->isSMTP();
    $mail ->Host="smtp.gmail.com";
    $mail ->SMTPAuth =true;
    $mail ->Username ="ekundayoshola129@gmail.com";
    $mail ->Password ="orrs abak ipmk lqme";
    $mail ->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
    $mail ->Port =587;
    $mail ->setFrom('ekundayoshola129@gmail.com', 'Ekundayo Shola');
    $mail ->addAddress('ekundayoshola129@gmail.com', 'Ekundayo Shola');
    $mail ->isHTML(true);
    $mail ->Subject="Mail sent from my portfolio";
    $content=array("Name"=>$name,"Email"=>$email, "Message"=>$message);
    $con = json_encode($content, true);
    $mail ->Body="$con";
   // $mail ->AltBody=('plan text content');
    $mail ->send();
    http_response_code(200);
     echo header("location:index.html?message sent successful");
   }
   catch(PDOException $x){
    echo $x->getMessage();
   }
?>