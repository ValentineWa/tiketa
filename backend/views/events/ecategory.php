<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Eventcategory */
/* @var $form ActiveForm */
?>
<div class="ecategory">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ecategoryName') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- ecategory -->
