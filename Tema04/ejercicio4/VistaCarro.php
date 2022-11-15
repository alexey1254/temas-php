<?php
    if(isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];
    } else {
        $carrito = new Carrito();

    }
    if (isset($_POST['idProd'])) {
        $producto = null;
        $idProd = $_POST["idProd"];
        foreach ($listaProductos as $prod ) {
            if($prod->id == $idProd) {
                $producto = $prod;
                break;
            }
        }
        if($producto != null) {
            $carrito->aniadir($producto);
        }
        $carrito->aniadir();
    }
    $listaProductosCarro = $carrito->getListaProductos();
    foreach($listaProductosCarro as $prod) {
        echo "<div>",$prod->nombre,"<br>\n
        <img src='$prod->imagen'></img><br>
        Precio: $prod->precio","€<br>
        <p>Cantidad: $prod->cantidad </p>
        <form action='' method='post' enctype='multipart/form-data'>
            <input type='hidden' id='idProd_$prod->id' value='$prod->id' name='idProd' />
        <button type='submit' name='btnEliminar'>Eliminar</button>
        </form>
        </div>
        <hr/>
    ";
    }
    echo "Coste total:", $carrito->getCosteTotal();
    $_SESSION['carrito'] = $carrito;
?>