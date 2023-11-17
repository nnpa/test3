<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


use yii\web\NotFoundHttpException;
use app\models\Twit;
use app\models\Category;

class SiteController extends Controller
{
    
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        $twits = Twit::find()->all();
        $categories = Category::find()->all();

        return $this->render('index',["twits"=>$twits,"categories"=>$categories]);  
    }
    
    public function actionGetmessages(){
        $twits = Twit::find()->all();
        $resultArr= [];
        foreach($twits as $twit){
            $arr = [
                "userName"=>$twit->username,
                "content" => $twit->content,
                "createdAt" => $twit->createdAt,
                "category" => $twit->category->title    

            ];
            $resultArr[]=$arr;
        }
        
        echo json_encode($resultArr);
    }
   
}
