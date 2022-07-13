<?php
    require_once('Connection.php');


    function fnAddCliente($nome, $foto, $email, $cpf, $arquivo) {
        $con = getConnection();
        
        
        $sql = "insert into cliente (nome, foto, email, cpf, arquivo) values (:pNome, :pFoto, :pEmail, :pCpf, :pArquivo)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto); 
        $stmt->bindParam(":pEmail", $email); 
        $stmt->bindParam(":pCpf", $cpf);
        $stmt->bindParam(":pArquivo", $arquivo);  
        
        return $stmt->execute();
    }

    function fnListClientes() {
        $con = getConnection();

        $sql = "select * from cliente";

        $result = $con->query($sql);

        $lstClientes = array();
        while($cliente = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstClientes, $cliente);
        } 

        return $lstClientes;
    }

    function fnLocalizaClientePorNome($nome) {
        $con = getConnection();

        $sql = "select * from cliente where nome like :pNome limit 20";

        $stmt = $con->prepare($sql);

        $stmt->bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaClientePorId($id) {
        $con = getConnection();

        $sql = "select * from cliente where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }
    
    function fnUpdateCliente($id, $nome, $foto, $email, $cpf, $arquivo) {
        $con = getConnection();
                
        $sql = "update cliente set nome = :pNome, foto = :pFoto, email = :pEmail, cpf = :pCpf, arquivo = :pArquivo where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id); 
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto); 
        $stmt->bindParam(":pEmail", $email); 
        $stmt->bindParam(":pCpf", $cpf); 
        $stmt->bindParam(":pArquivo", $arquivo); 
        
        return $stmt->execute();
    }
    
    function fnDeleteCliente($id) {
        $con = getConnection();
                
        $sql = "delete from cliente where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();
    }