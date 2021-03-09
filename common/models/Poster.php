<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "poster".
 *
 * @property int $posterId
 * @property int $eventId
 * @property string $imagePath
 *
 * @property Events $event
 */
class Poster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventId', 'imagePath'], 'required'],
            [['eventId'], 'integer'],
            [['imagePath'], 'string', 'max' => 100],
            [['eventId'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventId' => 'eventId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'posterId' => 'Poster ID',
            'eventId' => 'Event ID',
            'imagePath' => 'Image Path',
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::className(), ['eventId' => 'eventId']);
    }
}
