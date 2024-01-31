<?php

$a = 12;
$b = 34;
$c = 'sum';


function result($a, $b, $c){
    if($c == 'sum'){
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
    
    else{
        echo "please enter valid input.";
    }
    
}

$output = result($a, $b, $c);

echo "Your result is $output";

?>