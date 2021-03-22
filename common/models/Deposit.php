<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deposit".
 *
 * @property int $transId
 * @property string|null $merchantrequestId
 * @property int $cartId
 * @property float $transAmount
 * @property string $details
 * @property string|null $reciept
 * @property string $transDate
 * @property int $createdBy
 * @property int|null $status
 * @property int $phoneCode
 * @property int $mpesaNumber
 *
 * @property User $createdBy0
 * @property Cart $cart
 */
class Deposit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deposit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartId', 'transAmount', 'details', 'createdBy', 'phoneCode', 'mpesaNumber'], 'required'],
            [['cartId', 'createdBy', 'status', 'phoneCode', 'mpesaNumber'], 'integer'],
            [['transAmount'], 'number'],
            [['details'], 'string'],
            [['transDate'], 'safe'],
            [['merchantrequestId', 'reciept'], 'string', 'max' => 255],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['cartId'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cartId' => 'cartId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transId' => 'Trans ID',
            'merchantrequestId' => 'Merchantrequest ID',
            'cartId' => 'Cart ID',
            'transAmount' => 'Trans Amount',
            'details' => 'Details',
            'reciept' => 'Reciept',
            'transDate' => 'Trans Date',
            'createdBy' => 'Created By',
            'status' => 'Status',
            'phoneCode' => 'Phone Code',
            'mpesaNumber' => 'Mpesa Number',
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
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['cartId' => 'cartId']);
    }
}
