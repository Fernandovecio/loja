<?php
    date_default_timezone_set('America/Sao_Paulo');

    function uploadArquivo($file) {
        ## valida erros possiveis
        switch($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'arquivo excedeu o tamanho limite';
                exit;
            case UPLOAD_ERR_NO_FILE:
                echo 'arquivo não enviado';
                exit;
            default: 
                echo 'erro desconhecido';
                exit;
        }

        ## valida se o arquivo possui até 10mb

        if($file['size'] > 10000000) {
            echo 'tamanho superior a 10mb';
        }

        ## valida o tipo do arquivo
        $tipoValidos = array(
            'jpg'  => 'upload/jpeg',
            'jpeg' => 'upload/jpeg',
            'png'  => 'upload/png',
            'doc'  => 'application/vnd.ms-word',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'txt'  => 'text/plain',
            'ppt'  => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'zip'  => 'application/zip',
            'xls'  => 'application/excel'

        );
            
        # https://www.php.net/manual/en/function.array-search.php
        if(!$ext = array_search($file['type'], $tipoValidos, true)) {
            echo 'não é valido '; 
        }

        ## monta o novo nome do arquivo
        # https://www.php.net/manual/en/function.sprintf.php
        # https://www.php.net/manual/pt_BR/dir.constants.php
        $localSalvar = sprintf('.' . DIRECTORY_SEPARATOR . 'imagens' . DIRECTORY_SEPARATOR . '%s.%s', md5(date('Y.m.d-H.i.s.ms')), $ext);

        # https://www.php.net/manual/en/function.move-uploaded-file.php
        if(move_uploaded_file($file['tmp_name'], $localSalvar)) {
            # https://www.php.net/manual/en/function.substr
            return substr($localSalvar, 2);
        }
        
        echo 'ocorreu um erro ao tentar efetuar o upload';
    }
    
