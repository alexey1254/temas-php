<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sumaMedia</title>
</head>
<body>
    <?php
        $n1=$_GET['n1'];
        $n2=$_GET['n2'];
        $suma=0;

        for($i=$n1;$i<=$n2;$i++) {
            $suma+=$i;
        }
        echo "La suma vale $suma.\n<br/>";
        echo "La media vale: ",$suma/($n2-$n1-1);
    ?>
</body>
</html>