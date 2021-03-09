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
 *
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
            [['tcategoryName', 'description', 'ticketPrice'], 'required'],
            [['ticketPrice'], 'number'],
            [['tcategoryName', 'description'], 'string', 'max' => 255],
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
        ];
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
