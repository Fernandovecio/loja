<?php

    
    use PHPMailer\PHPMailer\PHPMailer;

    require_once('vendor/autoload.php');

    
    date_default_timezone_set('America/Sao_Paulo');

    # credenciais do conta(email) de envio
    define('GUSER', 'loja.sendmail@gmail.com');
    define('GPWD', 'loja@123qwe..');

    function send($usuario){
        $mail = new PHPMailer;

        # configuração do email
       $mail->isSMTP();
       $mail->SMTPDebug = 2; 
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPSecure = 'ssl';
       $mail->Port = 465;
       $mail->SMTPAuth = true;
       $mail->Username = GUSER;
       $mail->Password = GPWD;

       $mail->setFrom('recupera-senha@loja.com.br', 'Loja|Loja');
       $mail->addAddress($usuario->email); # destino
       $mail->Subject = 'Recuperação de senha'; # assunto

       $mail->msgHTML(constroiMensagem($usuario->senha));
       $mail->AltBody = "Sua nova senha é: {$usuario->senha}";

       # Envio de email
       $response = $mail->send();
       if($response)
       {
            ## manipulação de arquivos leitura/escrita
            # https://www.php.net/manual/pt_BR/function.fopen.php
            $log_file = fopen('log_email.log', 'a');
            $date = date('Y-m-d H:i');
            fwrite($log_file, "Email enviado: {$usuario->email} - {$date}\r\n\r\n");
            fclose($log_file);
            redirect('success', 'Foi gerado uma nova senha e enviada para seu email');
       }

       if(!$response)
       {
            $log_file = fopen('log_email.log', 'a');
            $date = date('Y-m-d H:i');
            fwrite($log_file, "{$mail->ErrorInfo}\r\n{$usuario->email}\r\n{$date}\r\n\r\n");
            fclose($log_file);
            redirect('danger', 'Ocorreu uma falha ao recuperar a senha');
       }
    }

    function constroiMensagem($senha){
        return   "<!DOCTYPE html>"
               . "<html lang='pt-br'>"
                . "<head>"
                    . "<meta charset='UTF-8'>"
                    . "<meta http-equiv='X-UA-Compatible' content='IE=edge'>"
                    . "<meta name='viewport' content='width=device-width, initial-scale=1.0'>"
                    . "<title>Recuperação de senha</title>"
                . "</head>"
                . "<body>"
                    . "<h1>Recuperação de senha <strong>Loja|Loja</strong></h1>"
                    . "<div align='center'>"
                        . "<h3>Sua nova senha é: {$senha}</h3>"
                    . "</div>"
                . "</body>"
                . "</html>";
    }

    function redirect($status, $msg){
        setcookie('notify', $msg, time() + 10, "loja/forgot-password.php", 'localhost');
        setcookie('status', $status, time() + 10, "loja/forgot-password.php", 'localhost');
        header("location: forgot-password.php");
        exit;
    }
