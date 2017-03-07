<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

class Candidate extends ActiveRecord {
    public function attributes()
    {
        return [
            '_id',
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
}