<?php

class Conexao
{

    private $host = 'localhost';
    private $dbname = 'app_tarefas';
    private $user = 'root';
    private $pass = '';

    public function conectar()
    {
        try {   //recuperar erro

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conexao;
        } catch (PDOException $e) {    //capturar erro // tipar o erro recebido 
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}
