<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mpesastkrequests".
 *
 * @property string $MerchantRequestID
 * @property string $phone
 * @property float $amount
 * @property string $reference
 * @property int $walletId
 * @property string $description
 * @property string $status
 * @property int $complete
 * @property string $CheckoutRequestID
 * @property int|null $userId
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Wallet $wallet
 * @property User $user
 */
class Mpesastkrequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mpesastkrequests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MerchantRequestID', 'phone', 'amount', 'reference', 'walletId', 'description', 'CheckoutRequestID'], 'required'],
            [['amount'], 'number'],
            [['walletId', 'complete', 'userId'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['MerchantRequestID', 'phone', 'reference', 'description', 'status', 'CheckoutRequestID'], 'string', 'max' => 191],
            [['MerchantRequestID'], 'unique'],
            [['CheckoutRequestID'], 'unique'],
            [['walletId'], 'exist', 'skipOnError' => true, 'targetClass' => Wallet::className(), 'targetAttribute' => ['walletId' => 'walletId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MerchantRequestID' => 'Merchant Request ID',
            'phone' => 'Phone',
            'amount' => 'Amount',
            'reference' => 'Reference',
            'walletId' => 'Wallet ID',
            'description' => 'Description',
            'status' => 'Status',
            'complete' => 'Complete',
            'CheckoutRequestID' => 'Checkout Request ID',
            'userId' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Wallet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWallet()
    {
        return $this->hasOne(Wallet::className(), ['walletId' => 'walletId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
