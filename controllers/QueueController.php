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

class QueueController extends Controller
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
    public function actionAccept($text,$categoryId,$userName)
    {
        $redis = Yii::$app->redis;
        $message = [
            'categoryId' => $categoryId,
            "text" => $text,
            "userName" => $userName,
            "createAt" => time()
        ];
        $redis->rpush("queues", serialize($message));
    }
    
    public function actionProcess(){
        set_time_limit(0);
        ini_set("memory_limit","128M");

        $redis = Yii::$app->redis;

        while(true){
            $result = $redis->lpop("queues");
            if(!is_null($result)){
                $messageArr = unserialize($result);
                $twit = new Twit();
                $twit->categoryId = $messageArr["categoryId"];
                $twit->content = $messageArr["text"];
                $twit->username = $messageArr["userName"];
                $twit->createdAt = $messageArr["createAt"];
                $twit->save(false);

            }
            $twit = null;
            $result = null;
            $messageArr = null;
        }
    }
}
