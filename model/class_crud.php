<?php

include("class_connect.php");

class ClassCrud extends Conexao
{
    private $Crud;
    private $Cont;

    //Contador de Parametros
    private function countParameters($parameters)
    {
        $this->Cont = count($parameters);
    }

    //Preparando declarativas
    public function preparedStatements($query, $parameters)
    {

        $this->countParameters($parameters);
        $this->Crud = $this->connectDB()->prepare($query);

        if ($this->Cont > 0) {
            for ($i = 1; $i <= $this->Cont; $i++) {
                $this->Crud->bindValue($i, $parameters[$i - 1]);
            }
        }

        $this->Crud->execute();
    }

    //Insert
    public function insertDB($table, $cond, $parameters)
    {
        $this->preparedStatements("insert into {$table} values ({$cond})", $parameters);
        return $this->Crud;
    }

    //Seleção no Banco de Dados

	public function selectDB($Campos , $Tabela , $Condicao , $Parametros){
		$this->preparedStatements("select {$Campos} from {$Tabela} {$Condicao}" , $Parametros);
		return $this->Crud;
	}


	//Deletar dados no DB

	public function deleteDB($Tabela , $Condicao , $Parametros){
		$this->preparedStatements("delete from {$Tabela} where {$Condicao}" , $Parametros);
    	return $this->Crud;
	}

	//Atualizando o banco de dados
	public function updateDB($Tabela, $Set, $Condicao, $Parametros){
		$this->preparedStatements("update {$Tabela} set {$Set} where {$Condicao}",$Parametros);
		return $this->Crud;
	}


}
