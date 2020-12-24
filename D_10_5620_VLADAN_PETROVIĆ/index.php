<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .orange {
            border: 1px solid orange;
        }

        .blue {
            border: 1px solid blue;
        }
    </style>

</head>
<body>

    <?php

        // Zadatak 1.
        $j = 89;
        $suma = 0;
        while($j > 0) {
            $suma += $j % 10;
            $j = $j / 10;
        }

        $j = 89;
            if($suma == $j) {
            echo "<p class='orange'> $suma </p>";
        }
            elseif($suma < $j) {
            echo "<p class='blue'> $suma </p>";
        }



        // Zadatak 2.
        $j = 30;
        $k = 1;
        $deljiv = 0;
        while($k <= $j) {
            if($j % $k == 0 && $k % 2 != 0 && $k % 3 == 0){
                    $deljiv++;
            }
            $k++;
        }
        echo "<p>$deljiv</p>";
        
        
    ?>



</body>
</html>


























 










  
    
    
   

    
