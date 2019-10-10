<?php

namespace app\controllers;

use Yii;
use app\service\TaxArrearParser;
use yii\web\Controller;
use app\models\TaxData;
use app\models\BccArrearsInfo;
use app\models\TaxArrear;
use app\models\TaxDataSearch;
use app\models\TaxOrgInfo;
use app\models\TaxPayerInfo;
use app\models\TaxArrearForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\EntryForm;
use yii\web\NotFoundHttpException;

/* ИИН = 670724450146 */

class SiteController extends Controller
{

    public function behaviors()
    {

        /**
         * {@inheritdoc}
         */

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post']
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $searchModel = new TaxDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSaveData()
    {
        /** @var TaxData $data */
        $data = \Yii::$app->session->get('taxData');

        $taxData = new TaxData();
        $taxData->load($data, '');
        $taxData->save();

        return $this->redirect('/');
    }

    /**S
     * Displays a single TaxArrear model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'data' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaxData model.
     * If creation is successful, the browser will be redirected to the 'save' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $taxArrearForm = new TaxArrearForm();


        if ($taxArrearForm->load(Yii::$app->request->post()) && $taxArrearForm->validate()) {
            $taxParser = new TaxArrearParser();
            $userData = $taxParser->getUserDate($taxArrearForm->iin);

            \Yii::$app->session->set('taxData', json_decode($userData, true));

            if ($userData != null) {
                return $this->render('save', ['taxData' => json_decode($userData)]);
            } else {
                return 'Данные не загружены';
            }
        }

        return $this->render('create', [
            'taxArrearForm' => $taxArrearForm
        ]);
    }


    protected function findModel($id)
    {
        if (($taxData = TaxData::findOne($id)) !== null) {

            $taxOrgInfo = TaxOrgInfo::find()->where(['taxDataId' => $id])->orderBy('id')->all();
            $taxPayerInfo = TaxPayerInfo::find()->where(['taxDataId' => $id])->orderBy('id')->all();
            $bccArrearsInfo = BccArrearsInfo::find()->where(['taxDataId' => $id])->orderBy('id')->all();

            $data = ['taxData' => $taxData, 'taxOrgInfo' => $taxOrgInfo, 'taxPayerInfo' => $taxPayerInfo, 'bccArrearsInfo' => $bccArrearsInfo];
            return $data;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
