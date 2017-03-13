<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

/**
 * Class Candidate
 * @property string _id
 * @property integer ID
 * @property string DISPLAYNAME
 * @property string WEBSITEURL
 * @property string LOCATION
 * @property string AGE
 * property string PROFILEIMAGEURL
 *
 * Related records
 * @property CandidateTag[] candidateTags
 * @package app\models
 */
class Candidate extends ActiveRecord
{
    public function attributes()
    {
        return [
            '_id',
            'ID',
            'DISPLAYNAME',
            'WEBSITEURL',
            'LOCATION',
            'AGE',
            'PROFILEIMAGEURL'
        ];
    }

    public static function collectionName()
    {
        return 'users';
    }

    public function extraFields()
    {
        $extraFields = parent::extraFields();
        $extraFields[] = 'candidateTags';
        return $extraFields;
    }

    public function getCandidateTags()
    {
        return $this->hasMany(Candidate::className(), ['user_id' => 'ID']);
    }
}