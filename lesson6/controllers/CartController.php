<?php


namespace app\controllers;

use app\services\Request;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;

class CartController extends Controller
{
  public function actionIndex() {
    $product = (new CartRepository())->getAll();

    echo $this->render("cart", ['product' => $product, 'className'=>$this->getClassName()]);
  }

  public function actionCard()
  {

    $id = (new Request())->getParams()['id'];

    $product = (new CartRepository())->getOne($id);

    echo $this->render("card", ['product' => $product, 'className'=>$this->getClassName()]);
  }

  public function actionAdd()
  {
    $id = (new Request())->getParams()['id'];;

    if (!$this->checkIfInCart()) {
    $product = (new ProductRepository())->getOne($id);
    (new CartRepository)->insert($product);

    echo $this->render("card", ['product' => $product, 'className'=>$this->getClassName()]);
    }
  }

  public function actionDel()
  {
    $id = (new Request())->getParams()['id'];;

    if ($this->checkIfInCart()) {
      $product = (new ProductRepository())->getOne($id);
      (new CartRepository)->delete($product);
      $location = $_SERVER['HTTP_REFERER'];
      header('Location:' . $location);
    }
  }

  public function getClassName() {
    return 'cart';
  }

  public function checkIfInCart () {
    $id = (new Request())->getParams()['id'];
    $product = (new CartRepository())->getOne($id);
    if ($product !== null) {
      return true;
    }
  }
}

