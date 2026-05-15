<!DOCTYPE html>
<html>
<head>
    <title>PHP Loops</title>
</head>
<body>
<?php
echo "For Loop<br/>";
for($i = 10; $i >= 3; $i--){
    echo $i . "<br>";
}




echo "While Loop<br/>";
$j = 10;
while($j >= 5){
    echo $j . "<br>";
    $j--;
}



echo "Do While Loop<br/>";
$k = 1;
do{
    echo $k . "<br>";
    $k++;
}
while($k <= 15);



echo "Foreach Loop<br/>";
$colors = ["blue", "pink", "red", "yellow"];
foreach($colors as $color){
    echo $color . "<br>";
}
?>
</body>
</html>