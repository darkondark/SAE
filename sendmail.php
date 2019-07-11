<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_GET["nome"]) & isset($_GET["email"])) {
  $nome = $_GET["nome"];
  $email = $_GET["email"];

  $assinatura = 'http://intranet.teiu.com.br/saet/gera_assinatura.php?assinatura=' . $email;

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'chamados@teiu.com.br';                 // SMTP username
    $mail->Password = 'chamados@2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ti3@teiu.com.br', 'Matheus Coqueiro Andrade');
    $mail->addAddress($email, $nome);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('ti3@teiu.com.br', 'Matheus Coqueiro Andrade');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('public/pdf/tutorial_trocar_assinatura.pdf');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'IMPORTANTE: Assinatura de email';
    $mail->Body    =
    nl2br("Bom dia $nome,

      O sistema de assinaturas foi refeito, segue abaixo o link para a sua assinatura.
      Estou enviando em anexo um tutorial de como realizar a troca da assinatura.

      Link: $assinatura

      Favor responder esse email informando se conseguiu realizar a troca da assinatura.

      Att, Matheus Coqueiro Andrade.
    ");
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
} else {
  echo 'Favor informar o email e o nome do destinatário.';
}
