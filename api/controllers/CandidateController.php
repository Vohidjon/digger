<?php
namespace app\controllers;

use app\models\Candidate;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

class CandidateController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        $q = \Yii::$app->request->getQueryParam('q');
        return Candidate::find()->andFilterCompare('DISPLAYNAME', $q)->limit(100)->all();
    }
}