<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cart */

$this->title = 'Update Cart: ' . $model->cartId;
$this->params['breadcrumbs'][] = ['label' => 'Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cartId, 'url' => ['view', 'id' => $model->cartId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
