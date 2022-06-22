<?php

include("../model/class_crud.php");
include("../helpers/var_pl.php");


$crud = new ClassCrud;


$crud->insertDB(
    "plano",
    "?,?,?,?,?,?,?",
    array(
        $id,
        $id_op,
        $nome_pl,
        $copar,
        $cobertura,
        $valor_re,
        $valor_pl
    )
);

$BFetch = $crud->selectDB("*", "plano", "where nome_plano=?", array($nome_pl));
$Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);


for($e=0; $e < count($hospital); $e++){
    $crud->insertDB(
        "hospital",
        "?,?,?,?",
        array(
            $id,
            $id_op,
            $Fetch['id'],
            $hospital[$e]
        )
    );
}

echo "<script> alert('Cadastrado com sucesso');</script>";
echo "<script> window.location.replace('../index.php');</script>";