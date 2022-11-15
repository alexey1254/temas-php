<?php
    require_once("DAOProductos.php");
    require_once("../../config.php");

    ?>
    <script type="text/javascript">
        function mostrarOcultarDetalle(idProd) {
            let btnDetalle = document.getElementById("btn_"+idProd);
            let capaDetalle = document.getElementById("prod_"+idProd)
            if(btnDetalle.textContent == 'Detalle') {
                btnDetalle.textContent='Ocultar';
                capaDetalle.classList.remove("oculto");
            } else {
                btnDetalle.textContent='Detalle';
                capaDetalle.classList.add("oculto");
            }
        }
    </script>
    <style>
        .oculto {
            display: none;
        }
    </style>

    <?php
    $listaProductos = getListaProductos();
    foreach($listaProductos as $prod) {
        echo "<div>",$prod->nombre,"<br>\n
            <img src='$prod->imagen'></img><br>
            Precio: $prod->precio","€<br>
            <div id='prod_$prod->id' class='oculto'>
                $prod->descripcion
            </div>
            <form action='' method='post' enctype='multipart/form-data'>
            <input type='hidden' id='idProd_$prod->id' value='$prod->id' name='idProd' />
            <button type='submit'>Comprar</button>
            <button type='button' onclick='mostrarOcultarDetalle($prod->id)' id='btn_$prod->id'>Detalle</button>
            </form>
            </div>
            <hr/>
            

        ";

    }

?>