
<?php

echo 'コーヒー';
echo PHP_EOL;
echo '紅茶';
echo "\n";
echo 'ほうじ茶';
echo "\n";
//
$drink = 'コーヒー';
echo $drink;
echo PHP_EOL;
//echo"\n";
echo '<br>';
$drink = '紅茶';
echo $drink;
echo "\n";

var_dump($drink);
echo "\n";

$price = 120;
var_dump($price);
echo "\n";

$tax_rate = 0.1;
var_dump($tax_rate);

//bool(論理型)
$is_discount = true;
var_dump($is_discount);


$message = $drink . 'の価格は' . $price . '円です。';
echo $message, PHP_EOL;

//calculate
$hp = 3;
$hp = $hp + 1;
var_dump($hp);

$hp = $hp - 1;
var_dump($hp);
$hp = $hp * 8;
var_dump($hp);

$hp = $hp / 2;
var_dump($hp);

$hp = 10;
$hp += 5;
$hp -= 2;
$hp *=3;
$hp /= 2;
var_dump($hp);

$hp = 10;
$is_equal = ($hp == 20);
var_dump($is_equal);

$hp = 5;
$is_under = ($hp < 10);
var_dump($is_under);

$hp = 15;
$is_over = ($hp < 10);
var_dump($is_over);