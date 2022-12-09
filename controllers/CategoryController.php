<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Product::find()
            ->where(['hit' => '1'])
            ->limit(6)
            ->all();

        $this->setMeta('E-Shopper | Home');
        return $this->render('index', [
            'hits' => $hits,
        ]);
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404, 'Такого категории нет');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->setMeta('E-Shopper | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', [
            'products' => $products,
            'pages' => $pages,
            'category' => $category,
        ]);
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));

        $this->setMeta('E-Shopper | поиск:  ' . $q);
        if(!$q){
            return $this->render('search', [
                'q' => 'пустая строка',
            ]);
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', [
            'products' => $products,
            'pages' => $pages,
            'q' => $q,
        ]);

    }
}