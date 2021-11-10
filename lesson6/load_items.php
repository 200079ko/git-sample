<?php
$path = 'data/informations.txt';
$informations = [];
if (file_exists($path)) {
    $file = fopen($path, 'r');
    //ta choung go bal read loat dht har
    while ($line = fgets($file)) {
        $informations[] = $line;
    }
    fclose($file);
}
$path = 'data/items.csv';
$items = [];
if (file_exists($path)) {
    $file = fopen($path, 'r');
    $columns = fgetcsv($file);

    while ($data = fgetcsv($file)) {
        foreach ($columns as $index => $column) {
            $item[$column] = $data[$index];
        }
        $items[] = $item;
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Information</h2>
    <ul>
        <?php foreach ($informations as $information) : ?>
            <li><?= $information ?></li>
        <?php endforeach ?>
    </ul>
    <h2>商品一覧</h2>
    <table>
        <?php foreach ($items as $item):?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['price'] ?></td>
            </tr>
            <?php endforeach ?>
    </table>
</body>

</html>