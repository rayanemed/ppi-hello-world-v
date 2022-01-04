<?php

class Conexao{

    public static function
    selectById($tabela, $colunas, $id){
        $sql = "SELECT $colunas FROM $tabela 
        WHERE id=$id;";
        $recurso = self::getConexao()
            ->prepare($sql);
        $recurso->execute();

        return $recurso->fetchAll();
    }

    public static function
    select($tabela, $colunas){
        $sql = "SELECT $colunas FROM $tabela;";
        $recurso = self::getConexao()
            ->prepare($sql);
        $recurso->execute();

        return $recurso->fetchAll();
    }

    public static function
    update($tabela, $parametros, $id){
        $sql = "UPDATE $tabela SET $parametros 
        WHERE id=$id;";
        $recurso = self::getConexao()
            ->prepare($sql);
        $recurso->execute();

    }

    public static function 
    delete($tabela, $id){
        $sql = "DELETE FROM $tabela WHERE 
        id=$id;";
        Conexao::getConexao()->exec($sql);
        echo $sql;
    }

    public static function 
    insert($tabela, $colunas, $valores){
        $sql = "INSERT INTO ". $tabela . "
        (" . $colunas . ") VALUES 
        (". $valores .");";
        Conexao::getConexao()->exec($sql);
        echo $sql;
    }

    private static function getConexao(){
        try{
            $conexao = new PDO(
                "pgsql:host=ec2-3-227-154-49.compute-1.amazonaws.com;port=5432;dbname=df4od0bkf7g1eb",
                "nyhrddadwdpqjy",
                "2f27b3f97526773f6d15428a4dcb5be3c7df729393d46ddee550da5f3664888f"
            );
            $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            //echo "Voilá !";
            return $conexao;
        }
        catch(PDOException $e){
            echo "Deu tiut: " . $e->getMessage();
        }
    }
}