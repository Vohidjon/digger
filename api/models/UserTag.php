<?php
namespace app\models;

use yii\mongodb\ActiveRecord;

class UserTag extends ActiveRecord
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

    public function getCandidate(){
        return $this->hasOne(Candidate::class, ['ID', 'user_id']);
    }
}