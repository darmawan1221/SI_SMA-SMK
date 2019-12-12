<?php

namespace app\controllers;

use Yii;
use app\models\AgamaUser;
use app\models\AgamaUserSearch;

use app\models\LulusUser;
use app\models\LulusUserSearch;

use app\models\MengulangUser;
use app\models\MengulangUserSearch;

use app\models\PutusUser;
use app\models\PutusUserSearch;

use app\models\SiswaBaruUser;
use app\models\SiswaBaruUserSearch;

use app\models\TotalUser;
use app\models\TotalUserSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KepemilikanUserController implements the CRUD actions for KepemilikanUser model.
 */
class SiswaController extends Controller
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
    public function actionIndex($id_daerah=1)
    {
        $searchModelAgamaSMA = new AgamaUserSearch();
        $dataProviderAgamaSMA = $searchModelAgamaSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelLulusSMA = new LulusUserSearch();
        $dataProviderLulusSMA = $searchModelLulusSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelMengulangSMA = new MengulangUserSearch();
        $dataProviderMengulangSMA = $searchModelMengulangSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelPutusSMA = new PutusUserSearch();
        $dataProviderPutusSMA = $searchModelPutusSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelSiswaBaruSMA = new SiswaBaruUserSearch();
        $dataProviderSiswaBaruSMA = $searchModelSiswaBaruSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelTotalSMA = new TotalUserSearch();
        $dataProviderTotalSMA = $searchModelTotalSMA->search(Yii::$app->request->queryParams, $id_daerah, 1);

        $searchModelAgamaSMK = new AgamaUserSearch();
        $dataProviderAgamaSMK = $searchModelAgamaSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        $searchModelLulusSMK = new LulusUserSearch();
        $dataProviderLulusSMK = $searchModelLulusSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        $searchModelMengulangSMK = new MengulangUserSearch();
        $dataProviderMengulangSMK = $searchModelMengulangSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        $searchModelPutusSMK = new PutusUserSearch();
        $dataProviderPutusSMK = $searchModelPutusSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        $searchModelSiswaBaruSMK = new SiswaBaruUserSearch();
        $dataProviderSiswaBaruSMK = $searchModelSiswaBaruSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        $searchModelTotalSMK = new TotalUserSearch();
        $dataProviderTotalSMK = $searchModelTotalSMK->search(Yii::$app->request->queryParams, $id_daerah, 2);

        return $this->render('index', [
            'searchModelAgamaSMA' => $searchModelAgamaSMA,
            'dataProviderAgamaSMA' => $dataProviderAgamaSMA,

            'searchModelLulusSMA' => $searchModelLulusSMA,
            'dataProviderLulusSMA' => $dataProviderLulusSMA,

            'searchModelMengulangSMA' => $searchModelMengulangSMA,
            'dataProviderMengulangSMA' => $dataProviderMengulangSMA,

            'searchModelPutusSMA' => $searchModelPutusSMA,
            'dataProviderPutusSMA' => $dataProviderPutusSMA,

            'searchModelSiswaBaruSMA' => $searchModelSiswaBaruSMA,
            'dataProviderSiswaBaruSMA' => $dataProviderSiswaBaruSMA,

            'searchModelTotalSMA' => $searchModelTotalSMA,
            'dataProviderTotalSMA' => $dataProviderTotalSMA,

            'searchModelAgamaSMK' => $searchModelAgamaSMK,
            'dataProviderAgamaSMK' => $dataProviderAgamaSMK,

            'searchModelLulusSMK' => $searchModelLulusSMK,
            'dataProviderLulusSMK' => $dataProviderLulusSMK,

            'searchModelMengulangSMK' => $searchModelMengulangSMK,
            'dataProviderMengulangSMK' => $dataProviderMengulangSMK,

            'searchModelPutusSMK' => $searchModelPutusSMK,
            'dataProviderPutusSMK' => $dataProviderPutusSMK,

            'searchModelSiswaBaruSMK' => $searchModelSiswaBaruSMK,
            'dataProviderSiswaBaruSMK' => $dataProviderSiswaBaruSMK,

            'searchModelTotalSMK' => $searchModelTotalSMK,
            'dataProviderTotalSMK' => $dataProviderTotalSMK,
        ]);
    }
}
