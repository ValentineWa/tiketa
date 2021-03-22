<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $cartId
 * @property int $userId
 * @property float $total
 * @property string $status
 * @property string $createdAt
 *
 * @property User $user
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'total', 'status'], 'required'],
            [['userId'], 'integer'],
            [['total'], 'number'],
            [['status'], 'string'],
            [['createdAt'], 'safe'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartId' => 'Cart ID',
            'userId' => 'User ID',
            'total' => 'Total',
            'status' => 'Status',
            'createdAt' => 'Created At',
        ];
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
