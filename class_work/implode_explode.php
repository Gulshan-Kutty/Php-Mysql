<?php
// implode example
$arr = array(
    0 => 'Apple',
    1 => 'Mango',
    2 => 'Orange',
    3 => 'Kiwi'

);

print_r($arr);
echo "<br>";

$imploded_arr = implode('|', $arr );

echo $imploded_arr;
echo "<br>----------------------------------<br>";
?>

<?php
// explode example
$str = 'Apple|Mango|Orange|Kiwi';
echo $str."<br>";


$exploded_arr = explode('|', $str);

print_r($exploded_arr);
// echo var_dump($exploded_arr);

echo "<br>----------------------------------<br>";

$str = 'Apple,Mango,Orange,Kiwi';
echo $str."<br>";


$exploded_arr = explode(',', $str);

print_r($exploded_arr);
// echo var_dump($exploded_arr);
?>

