<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $countryId
 * @property string $countryName
 * @property string|null $couPhoneCode
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryName'], 'required'],
            [['countryName', 'couPhoneCode'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'countryId' => 'Country ID',
            'countryName' => 'Country Name',
            'couPhoneCode' => 'Cou Phone Code',
        ];
    }
}
