<?php
include("../model/class_crud.php");


//update
/*if (isset($_GET['id'])) {
    $Acao = "Editar";
    $Crud = new ClassCrud();
    $BFetch = $Crud->selectDB("*", "plano", "where id=?", array($_GET['id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);

    $id = $Fetch['id'];

} else {
    $Acao = "Cadastrar";
    $id = "";
    
}*/
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
            <span class="teste"><a href="cadOP.php">
                    <h1>FORMULÁRIO OPERADORA </h1>
                </a></span>
            <a href="cadPL.php">
                <h1>FORMULÁRIO PLANO</h1>
            </a>
        </div>

        <div class="cad">
            <form method="post" action="../controller/ControllerPl.php" class="form" >


                <div>
                    <h2>PLANO:</h2>
                </div>
                <div>

                    <label>
                        <h4>Selecione a operadora *</h4>
                    </label>
                    

                    <select name="id_op">
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
                            <option value="<?php echo $Fetch['id']; ?>"><?php echo $Fetch['nome_op']; ?></option>
                            <
                        <?php
                        }

                        ?>
                    </select>


                </div>

                <div>
                    <label>
                        <h4>Nome do plano *</h4>
                    </label>
                    <input type="text" name="nome_pl" value="<?php ?>" placeholder="Digite o nome do plano" required>
                </div>
                <div>

                    <div>
                        <label>
                            <h4>Coparticipação *</h4>
                        </label>
                        <input type="text" name="copar" value="<?php ?>" placeholder="Digite a coparticipação e seu valor em %" required>
                    </div>

                    <div>
                        <label>
                            <h4>Cobertura *</h4>
                        </label>

                        <select name="cobertura">
                            <option value="Hospitalar">Hospitalar</option>
                            <option value="Ambolatorial + Hospital com Obstétrica">Ambolatorial + Hospital com Obstétrica</option>
                        </select>


                    </div>

                    <div>
                        <label>
                            <h4>Valor de reembolso (R$) *</h4>
                        </label>
                        <input type="text" name="valor_re" value="<?php ?>" placeholder="Digite o valor do reembolso em (R$)" required>
                    </div>

                    <div id="formulario">
                        <label>
                            <h4>Hospitais *</h4>
                        </label>
                        <div class="item">
                            <input type="text" name="valor[0][hospital]" value="" placeholder="Digite o nome do hospital" required>
                            <a href="#" id="botao_add">Adicionar novo item</a>
                        </div>
                    </div>

                    <div>
                        <label>
                            <h4>Valor do plano (R$) *</h4>
                        </label>
                        <input type="text" name="valor_pl" value="<?php ?>" placeholder="Digite o valor do plano em (R$)" required>
                    </div>


                    <div>
                        <label>
                            <h4>Visivel na pagina inicial:</h4>
                        </label>
                        <input type="text" name="op_visi" value="<?php ?>" placeholder="Sim ou Nao?" required>
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

    <script type="text/javascript">
        // Index dos items do formulario
        var index = 0;

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("botao_add").addEventListener('click', function() {
                // Sempre que alguem clicar no botão "botao_add" fazer:

                // Acrescenta mais um no index
                index++;

                // Gera uma nova div da classe item
                let novaDiv = document.createElement('div');
                novaDiv.setAttribute('class', 'item');

                // Os campos com o novo index
                let novoItem =
                    '<input type="text" name="valor[' + index + '][hospital]" placeholder="Digite o nome do hospital"> ';

                novaDiv.innerHTML = novoItem;

                // Adiciona o novo item na div "formulario" (mantendo o que já está lá)
                document.getElementById("formulario").appendChild(novaDiv);
            });
        });
    </script>
</body>

</html>