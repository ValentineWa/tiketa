<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cartitems".
 *
 * @property int $cartitemsId
 * @property int $cartId
 * @property int $eventId
 * @property int $quantity
 *
 * @property Cartitems $cart
 * @property Cartitems[] $cartitems
 * @property Events $event
 */
class Cartitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartId', 'eventId', 'quantity'], 'required'],
            [['cartId', 'eventId', 'quantity'], 'integer'],
            [['cartId'], 'exist', 'skipOnError' => true, 'targetClass' => Cartitems::className(), 'targetAttribute' => ['cartId' => 'cartitemsId']],
            [['eventId'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventId' => 'eventId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartitemsId' => 'Cartitems ID',
            'cartId' => 'Cart ID',
            'eventId' => 'Event ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cartitems::className(), ['cartitemsId' => 'cartId']);
    }

    /**
     * Gets query for [[Cartitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartitems()
    {
        return $this->hasMany(Cartitems::className(), ['cartId' => 'cartitemsId']);
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
