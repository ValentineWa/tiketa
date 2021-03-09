<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $profileId
 * @property string $fullName
 * @property string $mobileNumber
 * @property string $mobileType
 * @property int $userId
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullName', 'mobileNumber', 'mobileType', 'userId'], 'required'],
            [['mobileType'], 'string'],
            [['userId'], 'integer'],
            [['fullName', 'mobileNumber'], 'string', 'max' => 100],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profileId' => 'Profile ID',
            'fullName' => 'Full Name',
            'mobileNumber' => 'Mobile Number',
            'mobileType' => 'Mobile Type',
            'userId' => 'User ID',
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
