<?php

namespace app\controllers;

use Yii;
use app\models\Address;
use app\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AddressController extends Controller {

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['POST'],
                    'update' => ['POST'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

//    public function actionIndex()
//    {
//        $searchModel = new AddressSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//        ]);
//    }

//    public function actionView($id)
//    {
//        return $this->render('view', [
//                    'model' => $this->findModel($id),
//        ]);
//    }

    public function actionCreate($id)
    {
        $model = new Address();
        $model->user_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Adress created!');
            return $this->redirect(['user/view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Address updated!');
            return $this->redirect(['user/view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('danger', 'Address deleted!');
        return $this->redirect(['user/view', 'id' => $model->user_id]);
    }

    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
