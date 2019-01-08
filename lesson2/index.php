<?php

require_once 'classes/Product.php';
require_once 'classes/DigitalProduct.php';
require_once 'classes/WeightProduct.php';
require_once 'classes/PieceProduct.php';

require_once 'func/func.php';

//Несколько обычных товаров
$pieceProduct = new PieceProduct('Бумажная книга "Три мушкетера"', 1000, 1);
$pieceProduct2 = new PieceProduct('Бумажная книга "Основы PHP"', 1750, 3);

//Несколько цифровых товаров
$digitalProduct = new DigitalProduct('Цифровая книга "PHP. OOП"', 1000, 2);
$digitalProduct2 = new DigitalProduct('Цифровая книга "PHP. Паттерны проектирования"', 5000, 7);

//Несколько весовых товаров
$weightProduct = new WeightProduct('Гвозди мебельные', 100, 2.15);
$weightProduct2 = new WeightProduct('Рыба свежая "Семга"', 950, 1.25);


printProductInfo($pieceProduct);
printProductInfo($pieceProduct2);
printProductInfo($digitalProduct);
printProductInfo($digitalProduct2);
printProductInfo($weightProduct);
printProductInfo($weightProduct2);

echo "<h2>Итого общая сумма по всем категориям: {$pieceProduct->getTotalProfit()}</h2>";
