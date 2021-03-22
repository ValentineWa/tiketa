<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use frontend\models\Cart;

$cartList = Cart::find()->joinWith('shoes')->all();
$cartPrice = Cart::find()->joinWith('shoes')->sum('price');




?>
<h1>CONGRATULATIONS <?= \Yii::$app->User->username ?></h1>
<br>
<h2>Your Order is successful! </h2>
<h4>Your ticket was generated succesffully.</h4>
<h4>Save the QR CODE for admission.</h4>

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cartId',
            'userId',
            'total',
            'status',
           
        ],
    ]) ?>

  <h4>Total Price Order:<?= $cartPrice ?></h4>
  <div class="card col-md-8 shopp shadow-lg p-3 mb-5 bg-white rounded ">
           
        
                 <?php foreach ($cartList as $calist) { ?> 

         <div class="itemlist border-bottom">
          <div class="row">
            
            <div class="col-md-6">
             
      
              <p><b>Name:</b> <?=$calist->shoes->shoeName ?></p>
              <p><b>Description:</b> <?=$calist->shoes->description ?></p>
              <p><b>Size:</b> <?=$calist->shoes->shoeSize ?></p>
              <!-- <p> <i class="fa fa-trash-o trash" aria-hidden="true"></i></p> -->
                
            </div>
            
            <!-- <div class="col-md-3">
              <div class="quantity buttons_added">
                <input type="button" onchange="quantityChannge(this)" value="-" id="quantity" class="minus"><input type="number" step="1" min="1" max="3" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
              </div>
            </div> -->
            <div class="col-md-3">
              <p>Ksh<?=$calist->shoes->price?></p>
            </div>
          </div>
        </div>
        <?php } ?>

        </div>
   


         </div>


         <?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Myorder */

$this->title = $model->cartId;
$this->params['breadcrumbs'][] = ['label' => 'my cart', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cartId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cartId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Generate Order Report', ['viewpdf', 'id' => $model->cartId], [     'class' => 'btn btn-success'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cartId',
            'userId',
            'total',
            'status',
           
        ],
    ]) ?>
   <?= Html::a('Finish', ['congrats'], [     'class' => 'btn btn-success'])?>
  
    
</div>
