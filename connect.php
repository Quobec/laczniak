<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $connection = new mysqli("localhost","root","","laczniak");
        
        if($connection){
            echo "jest git";
            $wynik_zapytania = $connection->query("SELECT * FROM przyklad");
            
        } else {
            echo "jest not git";
        }
    ?>
    
</body>
</html>