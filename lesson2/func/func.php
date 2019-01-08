<?php

function printProductInfo ($object) {
  echo $object->getType();
  echo 'Наименование товара: ' . $object->getName() . '<br>';
  echo 'Обычная цена товара: ' . $object->getPrice() . '<br>';
  echo 'Цена товара со скидкой: ' . $object->getSalePrice() . '<br>';
  echo 'Количество товара: ' . $object->getNum() . '<br>';
  echo 'Общая стоимость товаров: ' . $object->getTotalCost() . '<br>';
  echo "<b>Итого по данной категории товара: {$object->getProfit()}</b>";
  echo '<hr>';
}

