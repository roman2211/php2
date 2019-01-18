<?php
namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo "catalog";
    }

    public function actionCard()
    {
        $this->useLayout = false;
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render("card", ['product' => $product]);
    }


    public function getAll()
    {
        return Product::getAll();
    }
}