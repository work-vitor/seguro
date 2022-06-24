<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Document</title>
</head>

<body>

    <div id="content">
        <table class="tabelaCrud">
            <tr>

            </tr>

            <?php
            include("../model/class_crud.php");



            
            $crud = new ClassCrud();
            $BFetch = $crud->selectDB("o.*, p.*", "operadora o", "INNER JOIN plano p ON p.id_operadora=o.id ", array());

            while ($Fetch = $BFetch->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <tr>
                    <td><?php echo $Fetch['nome_op']; ?></td>
                    <td><?php echo $Fetch['nome_plano']; ?></td>
                    



                    <td>
                        <a href="<?php echo "cadOP.php?id={$Fetch['id']};" ?>"><img src="https://img.icons8.com/material/24/000000/edit.png"></a>
                        <a class="Deletar" href="<?php echo "../controller/ControllerDelOp.php?id={$Fetch['id']};"  ?>"><img src="https://img.icons8.com/material/24/000000/delete.png"></a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>


</body>

</html>