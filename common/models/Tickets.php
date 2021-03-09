<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $ticketId
 * @property int $eventId
 * @property int $tcategoryId
 * @property string $ticketNumber
 * @property string $ticketDate
 * @property string $status
 * @property string $qrCode
 *
 * @property Events $event
 * @property Ticketcategory $tcategory
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventId', 'tcategoryId', 'ticketNumber', 'ticketDate', 'status', 'qrCode'], 'required'],
            [['eventId', 'tcategoryId'], 'integer'],
            [['ticketDate'], 'safe'],
            [['status'], 'string'],
            [['ticketNumber', 'qrCode'], 'string', 'max' => 100],
            [['eventId'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventId' => 'eventId']],
            [['tcategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Ticketcategory::className(), 'targetAttribute' => ['tcategoryId' => 'tcategoryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticketId' => 'Ticket ID',
            'eventId' => 'Event ID',
            'tcategoryId' => 'Tcategory ID',
            'ticketNumber' => 'Ticket Number',
            'ticketDate' => 'Ticket Date',
            'status' => 'Status',
            'qrCode' => 'Qr Code',
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
}
