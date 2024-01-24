<?php
    use PHPMailer\PHPMailer\PHPMailer;
    
    require './vendor/autoload.php';
    
    $mail = new PHPMailer;
    
    try {
    
        $mail->isSMTP();
        //$mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->ChartSet = 'utf8';
        
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@meuportifolio.tech';
        $mail->Password = 'App.9977';
        $mail->setFrom('contato@meuportifolio.tech');
        $mail->addReplyTo('contato@meuportifolio.tech');
        $mail->addAddress('contato@meuportifolio.tech');
        $mail->Subject = 'Meu Portifolio';
        
        $body = "Mensagem do site meuportifolio.tech
    
            Nome: ". $_POST['nome']. "
            E-mail: ". $_POST['emai']. "
            Assunto: ". $_POST['assunto']. "
            Mensagem: ". $_POST['mensagem'];

        $mail->Body = $body;
            
        $mail->send(); //{
        header("location:retorno.php");
    } catch (Exception $e) {
        echo "Erro: {$mail->ErrorInfo}";
    }
?>