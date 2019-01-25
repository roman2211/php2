<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{

  public function actionIndex() {
    $this->useLayout = false;

    $product = (new ProductRepository())->getAll();

    echo $this->render("gallery", ['product'=>$product, 'className'=>$this->getClassName()]);
  }


  public function actionCard() {

    $this->useLayout = false;

    $id = (new Request())->getParams()['id'];

    $product = (new ProductRepository())->getOne($id);

   echo $this->render("card", ['product'=>$product, 'className'=>$this->getClassName()]);
  }

  public function getClassName() {
    return 'product';
  }
}