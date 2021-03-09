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
 * @property int $ecategoryId
 * @property string $etype
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property User $createdBy0
 * @property Eventcategory $ecategory
 * @property Poster[] $posters
 * @property Tickets[] $tickets
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
            [['eventName', 'description', 'location', 'time', 'ecategoryId', 'etype', 'createdBy'], 'required'],
            [['time', 'createdAt'], 'safe'],
            [['ecategoryId', 'createdBy'], 'integer'],
            [['etype'], 'string'],
            [['eventName', 'description'], 'string', 'max' => 255],
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
            'ecategoryId' => 'Ecategory ID',
            'etype' => 'Etype',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
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
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['eventId' => 'eventId']);
    }
}
