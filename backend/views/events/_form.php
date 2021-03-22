<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Eventcategory;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
/* @var $form yii\widgets\ActiveForm */
$categori =ArrayHelper::map(Eventcategory::find()->all(), 'ecategoryId', 'ecategoryName')

?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eventName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'eventPrice')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'evenDate')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => true, 
         // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>
    <?= $form->field($model, 'ecategoryId')->dropDownList($categori) ?>

    <?= $form->field($model, 'etype')->dropDownList([ 'Paid' => 'Paid', 'Free' => 'Free', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdBy')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?> 

 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
