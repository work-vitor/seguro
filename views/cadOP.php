<?php
include("../model/class_crud.php");


//update
if (isset($_GET['id'])) {
    $Acao = "Editar";
    $Crud = new ClassCrud();
    $BFetch = $Crud->selectDB("*", "operadora", "where id=?", array($_GET['id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);

    $id = $Fetch['id'];
    $nome_op = $Fetch['nome_op'];
    $nome_logo = $Fetch['nome_logo'];
    $op_visi = $Fetch['op_visi'];
} else {
    $Acao = "Cadastrar";
    $id = "";
    $nome_op = "";
    $nome_logo = "";
    $op_visi = "";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Home</title>
</head>

<body>

    <div class="main-header">
        <a href="index.php"><img src="../img/logo_desafiador.png" alt="logo_maktub" width="220" height="50"></a>
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">CONTATO</a></li>
            <li><a href="../index.php">PLANOS</a></li>
            <li><a href="cadOP.php">CMS</a></li>
        </ul>
    </div>


    <div class="block_az">

        <div class="container">
            <h1>FORMULÁRIO OPERADORA </h1>
            <h1>FORMULÁRIO PLANO</h1>
        </div>

        <div class="cad">
            <form method="post" action="../controller/ControllerOp.php" class="form" enctype="multipart/form-data">
                <input type="hidden" name="Acao" id="Acao" value="<?php echo $Acao; ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                

                <div>
                    <h2>OPERADORA</h2>
                </div>
                <div>
                    <label>
                        <h4>Logo *:</h4>
                    </label>

                    <?php
                        if(isset($_GET['id'])){
                            echo '<input type="hidden" name="ver_logo" id="ver_logo" value="<?php echo $nome_logo; ?>">';
                            echo '<img src="../img/up/'.$nome_logo.'" alt="logo_maktub" width="220" height="50">';
                        }else{
                            echo ' <input type="file" name="pic" value="<?php echo $nome_logo; ?>" placeholder="Selecione ou arraste um arquivo">';
                        }

                    ?>
                </div>
                <div>
                    <label>
                        <h4>Nome da operadora:</h4>
                    </label>
                    <input type="text" name="nome_op" value="<?php echo $nome_op; ?>" required>
                </div>
                <div>
                    <label>
                        <h4>Visivel na pagina inicial:</h4>
                    </label>
                    <input type="text" name="op_visi" value="<?php echo $op_visi; ?>" placeholder="Sim ou Nao?" required>
                </div>
                <div>
                    <br>
                </div>

                <div>
                    <button type="submit" name="btn-enviar" class="btn_enviar">Enviar</button>
                    <button type="reset" name="btn-limpar" class="btn_limpar">Limpar</button>
                </div>
            </form>



        </div>

        <div id="content">
            <table class="tabelaCrud">
                <tr>

                </tr>

                <?php
                $crud = new ClassCrud();
                $BFetch = $crud->selectDB(
                    "*",
                    "operadora",
                    "",
                    array()
                );

                while ($Fetch = $BFetch->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <tr>
                        <td><?php echo $Fetch['nome_op']; ?></td>

                        <td>
                            <a href="<?php echo "cadOP.php?id={$Fetch['id']};" ?>"><img src="https://img.icons8.com/material/24/000000/edit.png"></a>
                            <a class="Deletar" href="<?php echo "../controller/ControllerDelOp.php?id={$Fetch['id']};"  ?>"><img src="https://img.icons8.com/material/24/000000/delete.png"></a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </table>

        </div>
    </div>
</body>

</html>