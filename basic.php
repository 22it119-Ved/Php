<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Basics</title>
</head>
<body>
    <p>Basics of Php : </p>
    <div class="container">
        <?php
            echo "Hello world and this is printed using php";
        
        echo "<br>";
            echo "Hello world again";
        
            define('pi',3.14);
            $variable1 = 10;
            $variable2 = 2;
            echo "<br>";
            echo $variable1;
            echo "<br>";
            echo $variable2;
            echo "<br>";

            echo "Variable 1 + Variable 2 = ";
            echo $variable1 + $variable2;
            echo "<br>";
            echo "Variable 1 - Variable 2 = ";
            echo $variable1 - $variable2;
            echo "<br>";
            echo "Variable 1 * Variable 2 = ";
            echo $variable1 * $variable2;
            echo "<br>";
            echo "Variable 1 / Variable 2 = ";
            echo $variable1 / $variable2;
            echo "<br>";

            $newVar = $variable1;
            $newVar += 1;
            echo "Increment = ";
            echo $newVar;
            echo "<br>";
            $newVarr = $variable1;
            $newVarr -= 1;
            echo "Decrement = ";
            echo $newVarr;
            echo "<br>";

            echo "The value of 1==4 is ";
            echo var_dump(1==4);
            echo "<br>";
            echo "The value of 1!=4 is ";
            echo var_dump(1!=4);
            echo "<br>";
            echo "The value of 1<=4 is ";
            echo var_dump(1<=4);
            echo "<br>";
            echo "The value of 1>=4 is ";
            echo var_dump(1>=4);

            echo "<br>";    
            $var = 43;
            echo var_dump($var);
            echo "<br>";
            $var = 43.1;
            echo var_dump($var);
            echo "<br>";
            $var = true;
            echo var_dump($var);
            echo "<br>";

            echo(pi); 
        ?>
    </div>
</body>
</html>