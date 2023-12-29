<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mul Table</title>
</head>
<body>
    <form name='form' method='post'>
        Enter number to find table:
        <input type="number" name='n'>
        <br><br>
        <input type="submit" name='sub'>
    </form>
<?php
// $num = readline("Enter any number:");
// $num = 6;
@$num = $_POST['n'];
@$sub = $_POST['sub'];
if($sub)
for ($i=1; $i < 11; $i++) { 
    echo "$num x $i = ".$num*$i;
    echo "<br>";
}

?>
</body>
</html>
