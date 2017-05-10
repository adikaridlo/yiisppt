<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SpptForm;
use app\models\Sppt;

class SpptController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $model = new SpptForm();
      if ($model->load(Yii::$app->request->post())) {
          //Yii::$app->session->setFlash('contactFormSubmitted');
      $post=Yii::$app->request->post('SpptForm');
      $ex=explode('.',$post['NOP']);
      $data = Sppt::find()->where(['kd_propinsi' => $ex[0],'kd_dati2'=>$ex[1],'kd_kecamatan' => $ex[2],'kd_kelurahan'=>$ex[3],'kd_blok'=>$ex[4],'no_urut' => $ex[5],'kd_jns_op'=>$ex[6],'thn_pajak_sppt'=>$post['tahun']])->asArray()->one();
      $tempo=strtotime($data['TGL_JATUH_TEMPO_SPPT']);$hariini = strtotime(date("d-m-Y"));
      $hsl = floor(($hariini - $tempo)/2592000);
      if($hsl>24){
        $hsl = 24;
      }
      if($data['STATUS_PEMBAYARAN_SPPT']==1){
        $denda = 0;
      }else{
        $denda = $data['PBB_YG_HARUS_DIBAYAR_SPPT']*(2*$hsl/100);
      }
      return $this->render('hasil', [
          'data' => $data,
          'nop'=>$post['NOP'],
          'denda'=>$denda
        ]);
      }else{
      return $this->render('index', [
          'model' => $model,
      ]);}
    }


}
