<?php
/**
 * Created by PhpStorm.
 * User: Djon
 * Date: 18.01.2017
 * Time: 15:20
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        //debug($hits);
        return $this->render('index', compact('hits'));

    }
}