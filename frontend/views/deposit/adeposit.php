<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Profile;
use common\models\Cart;
use common\models\Country;
/* @var $this yii\web\View */
/* @var $model common\models\Deposit */
/* @var $form ActiveForm */



$oda = Cart::find()->where(['userId'=>Yii::$app->user->id])->joinWith('user')->all();
$charge = Cart::find()->where(['userId'=>Yii::$app->user->id])->one();

?>
<div class="adeposit">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cartId')->hiddenInput(['value' => $oda[0]->cartId, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'transAmount')->hiddenInput(['value' => $order->total])->label(false)  ?>
        <?= $form->field($model, 'createdBy')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'phoneCode')->dropDownList(ArrayHelper::map(Countries::find()->all(), 'couPhoneCode', 'countryName'))?>
        <?= $form->field($model, 'mpesaNumber') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'transDate') ?>
        <?= $form->field($model, 'merchantrequestId')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'reciept') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- adeposit -->

