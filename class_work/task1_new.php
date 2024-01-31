<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mul Table</title>
</head>
<body>
    <form name='form' method='post'>
        Enter first number:
        <input type="number" name='m'>
        <br><br>
        Enter second number:
        <input type="number" name='n'>
        <br><br>
        Enter arithmetic operation:
        <input type="text" name='p'>
        <br><br>
        <input type="submit" name='sub'>
    </form>
<?php
// $num = readline("Enter any number:");
// $num = 6;
@$num1 = $_POST['m'];
@$num2 = $_POST['n'];
@$val = $_POST['p'];
@$sub = $_POST['sub'];
function result($a, $b, $c){
    if($c == 'add'){
        $res = $a + $b;
        return $res;
    }
    
    elseif($c == 'subtract'){
        $res = $a - $b;
        return $res;
    }

    elseif($c == 'multiply'){
        $res = $a * $b;
        return $res;
    }

    if($c == 'divide'){
        $res = $a / $b;
        return $res;
    }
    
    // else{
    //     echo "please enter valid input.";
    // }
    
}
$output = result($num1, $num2, $val);

if($sub)

echo "Your result is $output";


?>

</body>
</html>
