<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops</title>
</head>
<body>
    <p>Loops in Php : </p>
    <p>While Loop</p>
    <?php
        $a = 0;
        while($a <= 10) {
            echo "a : ";
            echo $a;
            echo "<br>";
            $a++;
        }
    ?>

    <p>Do While Loop</p>
    <?php
        $a = 20;
        do{
            echo "a : ";
            echo $a;
            echo "<br> ";
            $a++;
        } while ($a < 10);
    ?>

    <p>For Loop</p>
    <?php
        for($a=0 ; $a < 10 ; $a++){
            echo "a : ";
            echo $a;
            echo "<br> ";
        }
    ?>

    <p>For each Loop</p>
    <?php
        $languages = array("C", "C++","Python","Java");
        foreach($languages as $value) {
            echo "Language : ";
            echo $value;
            echo "<br>";
        }
    ?>
</body>
</html>