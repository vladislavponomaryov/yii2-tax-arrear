<?php

namespace app\models;

use yii\base\Model;

class TaxArrearForm extends Model
{
    public $iin;

    public function rules()
    {
        return [
            [
                ['iin'], 'required'
            ]
        ];
    }
}
