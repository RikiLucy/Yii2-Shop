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
use app\modules\admin\models\Slider;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->all(); //limit(6)->
        $sliders = Slider::find()->all();
        $this->setMeta('E_SHOPPER');
        //debug($hits);
        return $this->render('index', compact('hits', 'sliders'));

    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории не существует :С');

/*        $products = Product::find()->where(['category_id' => $id])->all();*/
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E_SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category', 'pages'));

    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E_SHOPPER | Поиск ' . $q);
        if (!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products','pages', 'q'));
    }

}