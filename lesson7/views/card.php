<?php
    $img = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/img/' . $product->photo;
?>

<img src="<?= $img ?>" alt="<?= $product->name ?>"><br><br>
<b>Название: </b><?= $product->name ?><br><br>
<b>Краткое описание: </b><?= $product->short_description ?><br><br>
<b>Описание: </b><?= $product->description ?><br><br>
<b>Цена: </b><?= $product->price ?> руб.<br><br>
<?= $product->category_id ?><br><br><hr>-->
