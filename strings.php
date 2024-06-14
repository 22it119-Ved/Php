<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strings</title>
</head>
<body>
    <?php
        $str = "This this this";
        $str1 = "Hello";
        echo $str. "<br>";
        echo $str1. "<br>";
        $lenn = strlen($str);
        echo "<br>";
        echo "The Length of this String is ". $lenn . "Right? <br><br>";
        echo "The Number of words in this String is ". str_word_count($str) . ".Right? <br><br>";
        echo "The Reversed string is ". strrev($str1) . ".Right? <br><br>";
        echo "The Position for  'is' in this string is ". strpos($str, "is") . ".Right? <br><br>";
        echo "The Replaced string is " . str_replace("is", "at", $str) . ".Right? <br><br>";
    ?>
</body>
</html>