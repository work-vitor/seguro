<?php

include("../model/class_crud.php");

$Crud = new Classcrud();
$idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$Crud->deleteDB(
    "operadora",
    "Id=?",
    array(
        $idUser
    )
);

echo "<script> alert('Deletado com sucesso');</script>";
echo "<script> window.location.replace('../views/cadOP.php');</script>";
