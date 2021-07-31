<?php
$result="";
if(isset($_POST['submit'])){
  
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;
  
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
   
    $mail->Username='eatmubarak@gmail.com';
    $mail->Password='hussainmurtaza789';

    $mail->setFrom($_POST['email'],  $_POST['name']);
    $mail->addAddress('eatmubarak@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['name']);

    $mail->isHTML(true);
    $mail->Subject='Form Submission: '.$_POST['subject'];
    $mail->Body='<h1 align=center>Name :'.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Phone: '.$_POST['phone'].'<br>Message: '.$_POST['msgtxt'].'</h1>';

    if(!$mail->send())
    {
        $result="Something wrong. Please try again!";

        echo '<script type="text/javascript">';
        echo 'alert("'.$result.'");';
        echo 'window.location.href = "../contact.php";';
        echo '   </script>  ';
    }
    else{
        $result="Thanks ".$_POST['name'] . " for contacting us. We'll get back to you soon!";

        echo '<script type="text/javascript">';
        echo 'alert("'.$result.'");';
        echo 'window.location.href = "../contact.php";';
        echo '   </script>  '; 
    }
}

?>
