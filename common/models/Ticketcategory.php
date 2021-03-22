<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ticketcategory".
 *
 * @property int $tcategoryId
 * @property string $tcategoryName
 * @property string $description
 * @property float $ticketPrice
 * @property string $status
 * @property int $eventId
 *
 * @property Events $event
 * @property Tickets[] $tickets
 */
class Ticketcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticketcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tcategoryName', 'description', 'ticketPrice', 'status', 'eventId'], 'required'],
            [['ticketPrice'], 'number'],
            [['status'], 'string'],
            [['eventId'], 'integer'],
            [['tcategoryName', 'description'], 'string', 'max' => 255],
            [['eventId'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventId' => 'eventId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tcategoryId' => 'Tcategory ID',
            'tcategoryName' => 'Tcategory Name',
            'description' => 'Description',
            'ticketPrice' => 'Ticket Price',
            'status' => 'Status',
            'eventId' => 'Event ID',
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
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['tcategoryId' => 'tcategoryId']);
    }
}
