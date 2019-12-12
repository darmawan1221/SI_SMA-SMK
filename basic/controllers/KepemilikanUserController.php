<?php

namespace app\controllers;

use Yii;
use app\models\KepemilikanUser;
use app\models\KepemilikanUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KepemilikanUserController implements the CRUD actions for KepemilikanUser model.
 */
class KepemilikanUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all KepemilikanUser models.
     * @return mixed
     */
    public function actionIndex($id_daerah)
    {
        $searchModel = new KepemilikanUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id_daerah, 1);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
