<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        //Configurações do servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                      
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;                             
        $mail->Username = 'contato@meuportifolio.tech';        
        $mail->Password = 'App.9977';                         
        $mail->SMTPSecure = 'SSL/TLS'; 
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';                        
        $mail->Port = 465;     

        //Destinatario
        $mail->setFrom('contato@meuportifolio.tech', 'Mailer');
        $mail->addAddress('contato@meuportifolio.tech', 'AddAddress01'); 
        $mail->addReplyTo('contato@meuportifolio.tech', 'Informações');
        $mail->isHTML(true);                   
        $mail->Subject = 'MSN-MeuPortifolio.tch';

        $body = "mensagem enviada através do site, segue informações
        abaixo:<br>
            Nome: ". $_POST['nome']. "<br>
            E-mail: ". $_POST['emai']. "<br>
            Assunto: ". $_POST['assunto']. "<br>
            Mensagem:<br> ". $_POST['mensagem'];

        $mail->Body = $body;

        $mail->send();
        echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo 'Erro ao enviar o e-mail!';
        echo 'Qual é o erro que tivemos: ' . $mail->ErrorInfo;
    }
}else{
    echo "Erro ao enviar e-mail, acesso não foi via formulário!";
}