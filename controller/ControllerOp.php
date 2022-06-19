<?php


include("../model/class_upload.php");
include("../model/class_crud.php");
include("../helpers/var_op.php");

$up = new ClassUpload;
$crud = new ClassCrud;

if ($Acao == "Cadastrar") {
    $name_img = $up->uploadLogo($img1, $img2, $teste);
    if ($name_img == false) {
        echo "<script> alert('Formato de Imagem Inválido');</script>";
        echo "<script> window.location.replace('../views/cadOP.php');</script>";
    } else {
        $crud->insertDB(
            "operadora",
            "?,?,?,?",
            array(
                $id,
                $nome_op,
                $name_img,
                $op_visi
            )
        );
        echo "<script> alert('Cadastrado com sucesso');</script>";
        echo "<script> window.location.replace('../index.php');</script>";
    }
}else{
    $crud->updateDB(
        "operadora",
        "nome_op=?, op_visi=?",
        "id=?",
        array(
            $nome_op,
            $op_visi,
            $id
        )
        );
        echo "<script> alert('Editado com sucesso');</script>";
        echo "<script> window.location.replace('../index.php');</script>";
}
