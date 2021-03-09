<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deposit".
 *
 * @property int $transId
 * @property string|null $merchantrequestId
 * @property int $walletId
 * @property float $transAmount
 * @property string $details
 * @property string|null $reciept
 * @property string $transDate
 * @property int $createdBy
 * @property int|null $status
 * @property int $phoneCode
 * @property int $mpesaNumber
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
            [['walletId', 'transAmount', 'details', 'createdBy', 'phoneCode', 'mpesaNumber'], 'required'],
            [['walletId', 'createdBy', 'status', 'phoneCode', 'mpesaNumber'], 'integer'],
            [['transAmount'], 'number'],
            [['details'], 'string'],
            [['transDate'], 'safe'],
            [['merchantrequestId', 'reciept'], 'string', 'max' => 255],
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
            'walletId' => 'Wallet ID',
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
}
