<?php


namespace app\controllers;

use app\models\Basket;
use app\models\repositories\ProductRepository;
use app\services\Request;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $basket = (new Basket())->getAll();
        echo json_encode(['basket' => $basket]);
      //  echo $this->render('cart', ['basket' => $basket]);
    }

    public function actionAdd()
    {
        $request = new Request();
        if ($request->isPost()) {
            $productId = (int)$request->getParams()['id'];
            $productQty = (int)$request->getParams()['qty'] ?: 1;
            (new Basket())->add($productId, $productQty);
            echo json_encode(["status" => "ok", "message" => "товар добавлен"]);
        }

    }
}