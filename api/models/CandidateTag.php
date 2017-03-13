<?php
namespace app\models;

use yii\mongodb\ActiveRecord;

/**
 * Class CandidateTag
 * @property string _id
 * @property string tag
 * @property integer user_id
 *
 * Related records
 * @property Candidate $candidate
 * @package app\models
 */
class CandidateTag extends ActiveRecord
{
    public function attributes()
    {
        return [
            '_id',
            'tag',
            'user_id'
        ];
    }

    public static function collectionName()
    {
        return 'user_tags';
    }

    public function extraFields()
    {
        $extraFields = parent::extraFields();
        $extraFields[] = 'candidate';
        return $extraFields;
    }

    public function getCandidate(){
        return $this->hasMany(Candidate::className(), ['ID' => 'user_id']);
    }
}