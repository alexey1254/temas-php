<?php

    function contadorVisitas($ruta="/var/www/phpdata/visitas.txt"):string {
        if(!file_exists($ruta)) {
            touch ($ruta);
        }
        $contenido = trim(file_get_contents($ruta));
            if($contenido == "") {
                $visitas = 1;
            } else {
                $visitas = intval($contenido);
                $visitas++;
            }
            file_put_contents($ruta, $visitas);
            return "Las visitas son: $visitas";
        }
    echo (contadorVisitas())
?>