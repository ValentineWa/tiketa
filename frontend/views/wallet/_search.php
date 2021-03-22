<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WalletSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'walletId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'currencyId') ?>

    <?= $form->field($model, 'walletName') ?>

    <?= $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
