<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $eventId
 * @property string $eventName
 * @property string $description
 * @property string $location
 * @property string $time
 * @property float $eventPrice
 * @property int $ecategoryId
 * @property string $etype
 * @property string $createdAt
 * @property int $createdBy
 * @property string $evenDate
 *
 * @property Cartitems[] $cartitems
 * @property User $createdBy0
 * @property Eventcategory $ecategory
 * @property Poster[] $posters
 * @property Titem[] $titems
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventName', 'description', 'location', 'time', 'eventPrice', 'ecategoryId', 'etype', 'createdBy', 'evenDate'], 'required'],
            [['eventPrice'], 'number'],
            [['ecategoryId', 'createdBy'], 'integer'],
            [['etype'], 'string'],
            [['createdAt'], 'safe'],
            [['eventName', 'description', 'time', 'evenDate'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 100],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['ecategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Eventcategory::className(), 'targetAttribute' => ['ecategoryId' => 'ecategoryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'eventId' => 'Event ID',
            'eventName' => 'Event Name',
            'description' => 'Description',
            'location' => 'Location',
            'time' => 'Time',
            'eventPrice' => 'Event Price',
            'ecategoryId' => 'Ecategory ID',
            'etype' => 'Etype',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
            'evenDate' => 'Even Date',
        ];
    }

    /**
     * Gets query for [[Cartitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartitems()
    {
        return $this->hasMany(Cartitems::className(), ['eventId' => 'eventId']);
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Ecategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEcategory()
    {
        return $this->hasOne(Eventcategory::className(), ['ecategoryId' => 'ecategoryId']);
    }

    /**
     * Gets query for [[Posters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosters()
    {
        return $this->hasMany(Poster::className(), ['eventId' => 'eventId']);
    }

    /**
     * Gets query for [[Titems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitems()
    {
        return $this->hasMany(Titem::className(), ['eventId' => 'eventId']);
    }
}
