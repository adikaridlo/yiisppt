<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $name
 * @property integer $population
 * @property integer $id
 */
class Sppt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pbb_switcher_prod';
    }

    /**
     * @inheritdoc
     */
    /*public function rules()
    {
        return [
            [['name'], 'required'],
            [['population'], 'integer'],
            [['name'], 'string', 'max' => 52],
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'population' => 'Population',
            'id' => 'ID',
        ];
    }*/
}
