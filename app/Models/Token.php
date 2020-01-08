<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token',
        'expired_at'
    ];

    public function generateToken($expire)
    {
        $this->expired_at = $expire;
        $this->token = \Yii::$app->security->generateRandomString();
    }
/*
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }*/
}





<?php

namespace api\models;

use yii\db\ActiveRecord;

class Token extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%token}}';
    }

    public function generateToken($expire)
    {
        $this->expired_at = $expire;
        $this->token = \Yii::$app->security->generateRandomString();
    }

    public function fields()
    {
        return [
            'token' => 'token',
            'expired' => function () {
                return date(DATE_RFC3339, $this->expired_at);
            },
        ];
    }
}