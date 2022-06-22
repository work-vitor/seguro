<?php

//ID
if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $id = 0;
}

//ID da operadora
if (isset($_POST['id_op'])) {
    $id_op = filter_input(INPUT_POST, 'id_op', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['id_op'])) {
    $id_op = filter_input(INPUT_GET, 'id_op', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $id_op = 0;
}

//Nome do Plano
if (isset($_POST['nome_pl'])) {
    $nome_pl = filter_input(INPUT_POST, 'nome_pl', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['nome_pl'])) {
    $nome_pl = filter_input(INPUT_GET, 'nome_pl', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $nome_pl = "";
}

//Coparticipação
if (isset($_POST['copar'])) {
    $copar = filter_input(INPUT_POST, 'copar', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['copar'])) {
    $copar = filter_input(INPUT_GET, 'copar', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $copar = "";
}

//Cobertura
if (isset($_POST['cobertura'])) {
    $cobertura = filter_input(INPUT_POST, 'cobertura', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['cobertura'])) {
    $cobertura = filter_input(INPUT_GET, 'cobertura', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $cobertura = "";
}

//Valor Reembolso
if (isset($_POST['valor_re'])) {
    $valor_re = filter_input(INPUT_POST, 'valor_re', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['valor_re'])) {
    $valor_re = filter_input(INPUT_GET, 'valor_re', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $valor_re = "";
}

//Valor Plano
if (isset($_POST['valor_pl'])) {
    $valor_pl = filter_input(INPUT_POST, 'valor_pl', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['valor_pl'])) {
    $valor_pl = filter_input(INPUT_GET, 'valor_pl', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $valor_pl = "";
}

//Visivel na pagina inicial

if (isset($_POST['op_visi'])) {
    $op_visi = filter_input(INPUT_POST, 'op_visi', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['op_visi'])) {
    $op_visi = filter_input(INPUT_GET, 'op_visi', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $op_visi = "";
}

//Teste array hospital
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $hospital[] = null;

    
    $i = 0;
    foreach ($_POST['valor'] as $item) {
        $hospital[$i] = $item['hospital'];
        $i++;
        //echo $item['hospital'];
        echo "<br>";
      }
}
