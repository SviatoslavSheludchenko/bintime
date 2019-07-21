<?php

namespace app\controllers;

use app\models\Address;
use app\models\AddressSearch;
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\base\Model;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $searchAddress = new AddressSearch();
        $dataAddress = $searchAddress->search(Yii::$app->request->queryParams);
        $dataAddress->query->andWhere(['user_id' => $id]);
        $pages = new Pagination(['totalCount' => $dataAddress->query->count(), 'pageSize' => 5, 'forcePageParam' => false,
            'pageSizeParam' => false]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'searchAddress' => $searchAddress,
                    'dataAddress' => $dataAddress,
                    'pages' => $pages
        ]);
    }

    public function actionCreate()
    {
        $user = new User();
        $address = new Address();

        if ($user->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post()) && Model::validateMultiple([$user, $address])) {
            $user->save(false);
            $address->user_id = $user->id;
            $address->save(false);

            Yii::$app->getSession()->setFlash('success', 'User ' . $user->login . ' created!');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'user' => $user,
                    'address' => $address
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'User ' . $model->login . ' updated!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('danger', 'User deleted!');

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
