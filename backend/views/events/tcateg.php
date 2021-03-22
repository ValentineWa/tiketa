<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Events;

/* @var $this yii\web\View */
/* @var $model common\models\Ticketcategory */
/* @var $form ActiveForm */
$event = ArrayHelper::map(Events::find()->all(), 'eventId', 'eventName');
?>
<div class="tcateg">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tcategoryName') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'ticketPrice') ?>
        <?= $form->field($model, 'status')->dropDownList([ 'Sale Open' => 'Sale Open', 'Sold Out' => 'Sold Out', '' => '', ], ['prompt' => '']) ?>
        <?= $form->field($model, 'eventId')->dropDownList($event) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tcateg -->
