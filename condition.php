<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions</title>
</head>
<body>
    <p>Conditions in Php : </p>
    <div class="container">
        <p>Voting Status :</p>
        <?php
            $age=19;
            if($age>18){
                echo "You are eligible to vote";
            }
            else{
                echo "You are not eligible to vote";
            }      
            
            echo "<br>";
            $languages = array("C", "C++","Python","Java");
            echo $languages[1];
            echo "<br>";
            echo count($languages);
        ?>
    </div>
</body>
</html>