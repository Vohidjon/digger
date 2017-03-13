<?php
namespace app\controllers;

use app\models\Candidate;
use app\models\UserTag;
use yii\data\ActiveDataProvider;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

class CandidateController extends Controller
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data',
        'metaEnvelope' => 'meta'
    ];
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
        $tags = explode(' ', strtolower($q));
        $query = Candidate::find()->with(['candidateTags'])->where(['candidateTags.tag' => 'angular']);
        return new ActiveDataProvider(['query' => $query]);
    }
}