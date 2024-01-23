<?php
    use PHPMailer\PHPMailer\PHPMailer;
    
    require './vendor/autoload.php';
    
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    //$mail->ChartSet = 'utf8';
    
    $mail->SMTPAuth = true;
    $mail->Username = 'contato@meuportifolio.tech';
    $mail->Password = 'App.9977';
    $mail->setFrom('contato@meuportifolio.tech', 'Your Name');
    $mail->addReplyTo('contato@meuportifolio.tech', 'Your Name');
    $mail->addAddress('contato@meuportifolio.tech', 'Receiver Name');
    $mail->Subject = 'Meu Portifolio';
    
    $body = "Mensagem do site meuportifolio.tech
    
        Nome: ". $_POST['nome']. "
        E-mail: ". $_POST['emai']. "
        Assunto: ". $_POST['assunto']. "
        Mensagem: ". $_POST['mensagem'];

    $mail->Body = $body;
            
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Erro: Mensagem não enviada, tente pelo whatsApp: 1196497-9977. Desculpe-nos! ' . $mail->ErrorInfo;
    } else {
        echo 'Sua mensagem foi enviada com sucesso!';
    }
?>