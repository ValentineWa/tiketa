<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "titem".
 *
 * @property int $titemId
 * @property int $tiketId
 * @property int $eventId
 * @property int $tcategoryId
 * @property int $quantity
 *
 * @property Events $event
 * @property Ticketcategory $tcategory
 * @property Tiket $tiket
 */
class Titem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiketId', 'eventId', 'tcategoryId', 'quantity'], 'required'],
            [['tiketId', 'eventId', 'tcategoryId', 'quantity'], 'integer'],
            [['eventId'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventId' => 'eventId']],
            [['tcategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Ticketcategory::className(), 'targetAttribute' => ['tcategoryId' => 'tcategoryId']],
            [['tiketId'], 'exist', 'skipOnError' => true, 'targetClass' => Tiket::className(), 'targetAttribute' => ['tiketId' => 'tiketId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'titemId' => 'Titem ID',
            'tiketId' => 'Tiket ID',
            'eventId' => 'Event ID',
            'tcategoryId' => 'Tcategory ID',
            'quantity' => 'Quantity',
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

    /**
     * Gets query for [[Tcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTcategory()
    {
        return $this->hasOne(Ticketcategory::className(), ['tcategoryId' => 'tcategoryId']);
    }

    /**
     * Gets query for [[Tiket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiket()
    {
        return $this->hasOne(Tiket::className(), ['tiketId' => 'tiketId']);
    }
}
