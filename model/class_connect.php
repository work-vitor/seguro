<?php


abstract class Conexao
{
    protected function connectDB()
    {
        try {
            $con = new PDO("mysql:host=localhost;dbname=maktub", "root", "");
            return $con;        
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }
}
