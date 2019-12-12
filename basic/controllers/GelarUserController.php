<?php

namespace app\controllers;

use Yii;
use app\models\GelarUser;
use app\models\GelarUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GelarController implements the CRUD actions for Gelar model.
 */
class GelarUserController extends Controller
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
     * Lists all Gelar models.
     * @return mixed
     */
    public function actionIndex($id_daerah)
    {
        $searchModelSMA = new GelarUserSearch();
        $searchModel = new GelarUserSearch();

        $dataProviderSMA = $searchModelSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);
        $dataProviderSMK = $searchModel->search(Yii::$app->request->queryParams, $id_daerah, 2);

        return $this->render('index', [
            'searchModelSMA' => $searchModelSMA,
            'searchModel' => $searchModel,

            'dataProviderSMA' => $dataProviderSMA,
            'dataProviderSMK'=>$dataProviderSMK
        ]);
    }
}
