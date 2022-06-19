<?php
include("model/class_crud.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Home</title>
</head>

<body>

    <div class="main-header">
        <a href="index.php"><img src="img/logo_desafiador.png" alt="logo_maktub" width="220" height="50"></a>
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">CONTATO</a></li>
            <li><a href="views/cadOP.php">PLANOS</a></li>
            <li><a href="views/cadOP.php">CMS</a></li>
        </ul>
    </div>


    <ul class="slider">
        <li>
            <input type="radio" id="slide1" name="slide" checked>
            <label for="slide1"></label>
            <img src="img/Banner_Porto2.jpg" />
        </li>
        <li>
            <input type="radio" id="slide2" name="slide">
            <label for="slide2"></label>
            <img src="img/Banner-Bradesco.jpg" />
        </li>
    </ul>


    <div class="planos">

        <?php

        $crud = new ClassCrud();
        $BFetch = $crud->selectDB(
            "*",
            "operadora",
            "",
            array()
        );
        while ($Fetch = $BFetch->fetch(PDO::FETCH_ASSOC)) {
            if (($Fetch['op_visi'] == "Sim")) {

        ?>

                <ul>
                    <li><a href=""><img src="img/up/<?php echo $Fetch['nome_logo']; ?>" alt="logo_maktub" width="220" height="50"></a></li>
                </ul>

        <?php
            }
        }
        ?>
    </div>


</body>

</html>