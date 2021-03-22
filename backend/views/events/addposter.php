<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Poster */
/* @var $form ActiveForm */
?>
<div class="addposter">

    <?php $form = ActiveForm::begin(['id' => 'image-create'],[
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

        <?= $form->field($model, 'eventId')->hiddenInput(['value' => $eventId])->label(false) ?>
        <?= $form->field($model, 'imagePath')->fileInput(['maxlength' => true]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addposter -->



       