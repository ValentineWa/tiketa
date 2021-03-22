<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tiket".
 *
 * @property int $tiketId
 * @property int $userId
 * @property string $status
 * @property string $createdAt
 * @property string $createdBy
 *
 * @property Titem[] $titems
 */
class Tiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'status', 'createdBy'], 'required'],
            [['userId'], 'integer'],
            [['status'], 'string'],
            [['createdAt'], 'safe'],
            [['createdBy'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tiketId' => 'Tiket ID',
            'userId' => 'User ID',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Titems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitems()
    {
        return $this->hasMany(Titem::className(), ['tiketId' => 'tiketId']);
    }
}
