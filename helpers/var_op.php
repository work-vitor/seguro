<?php

//ID
if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $id = 0;
}

//Acao
if (isset($_POST['Acao'])) {
    $Acao = filter_input(INPUT_POST, 'Acao', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['Acao'])) {
    $Acao = filter_input(INPUT_GET, 'Acao', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $Acao = "";
}

//Img

if (isset($_FILES['pic'])) {
    $img1 = $_FILES['pic']['name'];
    $img2 = $_FILES['pic']['tmp_name'];
    $teste = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
}else if(isset($_POST['ver_logo'])){
    $ver_logo = filter_input(INPUT_GET, 'ver_logo', FILTER_SANITIZE_SPECIAL_CHARS);
} 
else {
    echo "<script> alert('Imagem nao selecionada');</script>";
    echo "<script> window.location.replace('../views/cadOP.php');</script>";
}

//Nome Operadora

if (isset($_POST['nome_op'])) {
    $nome_op = filter_input(INPUT_POST, 'nome_op', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['nome'])) {
    $nome_op = filter_input(INPUT_GET, 'nome_op', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $nome_op = "";
}

//Visivel na pagina inicial

if (isset($_POST['op_visi'])) {
    $op_visi = filter_input(INPUT_POST, 'op_visi', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['op_visi'])) {
    $op_visi = filter_input(INPUT_GET, 'op_visi', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $nop_visi = "";
}
