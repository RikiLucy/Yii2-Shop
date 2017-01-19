<?php
/**
 * Created by PhpStorm.
 * User: Djon
 * Date: 19.01.2017
 * Time: 13:54
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class ProductController extends AppController
{
    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        // $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one(); // жадная загрузка
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E_SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));



    }
}