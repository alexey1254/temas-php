<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
<style>
        button{
            width:50px;
            height:50px;
            background-color: linen;
            border: 1px solid #BBBBBB;
        }
        .dark{
            background-color: black;
        }
        .alfil{
            background-color: #3355FF;
        }
        div{
            display: flex;
            flex-direction: column;
        }
        h1{
            display:flex;
            justify-content: center;
        }

        form{
            display:flex;
            justify-content: center;
        }

    </style>
    <?php
    $btn = $_POST['btn'];
    if(isset($_POST['btn'])){
        $coordenadas = explode(";",$btn);
        $x= intval($coordenadas[0]);
        $y= intval($coordenadas[1]);
    }
    ?>
    <div>
    <h1>Tablero de ajedrez</h1>
    
    <form action="" method="post" name="form">
    <table >
           <?php
           
            for ($i=0; $i < 8; $i++) { 
               ?><tr><?php
                   for ($j = 0; $j < 8; $j++) {
                       ?><td>
                        <?php

                            if((($i+$j) == ($x+$y) || ($i-$j) == ($x-$y)) && isset($_POST['btn'])  ){
                                ?>
                                <button name="btn" value="<?php echo $i.";".$j?>" class="alfil"></button>
                                <?php
                            }elseif (($i+$j)%2==0) {
                                ?>
                                <button name="btn" value="<?php echo $i.";".$j?>" class=""></button>
                                <?php
                            }else{
                                ?>
                                <button name="btn" value="<?php echo $i.";".$j?>" class="dark"></button>
                                <?php
                            }
                        ?>
                       </td>
                       <?php 
                    }
                   ?>
                </tr>
            <?php
           }
           ?>
    </table>
    </form>
    </div>
</body>
</html>