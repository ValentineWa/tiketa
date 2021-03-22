<?php

/* @var $this yii\web\View */
 use common\models\Events;
 use common\models\Poster;
 use common\models\Eventcategory;
 use yii\helpers\ArrayHelper; 
use yii\helpers\Html;
use yii\helpers\Url;


// $shoeTotal = Shoes::find()->joinWith('shoesimages')->all();

$cat1 = Events::find()->where(['ecategoryId'=> 1])->joinWith('posters')->all();
$cat2 = Events::find()->where(['ecategoryId'=> 2])->joinWith('posters')->all();
$cat3 = Events::find()->where(['ecategoryId'=> 3])->joinWith('posters')->all();
$cat4 = Events::find()->where(['ecategoryId'=> 4])->joinWith('posters')->all();
?>





<div class="container-fluid bg-dark">
    <div class="row">
    <h4>Category 1</h4>

    </div>
</div>
       <!--Top Kicks-->
<div class="container-fluid kick">
<h2 class="text-center"> Category 2</h2>
    <div class="row">
        <div class="col-md-12 subscribe">
            <div class="row">
            <?php $i = 4;
       foreach ($cat1 as $catone) {
         if (++$i > 8) break; ?>
  
            <div class="col-md-3">
                    <div class="card border border-light rounded"> <a href="<?= Url::to(['site/index', 'eventId'=>$catone->eventId])?>" >
                    <img src="<?= Yii::$app->request->baseUrl ?>/images/events/event-1.jpg"  class="img-fluid">

<button  class="btn btn-outline-info  centered">Buy Ticket</button>
  
                <p></p>
            </a>
                 </div>
                 </a>
                    <h4 class="card-title"><?= $catone['eventName'] ?></h4>
            
                </div>
                <?php } ?>
            
              </div>
       </div>
       </div>
       </div>
       <!--end-->
       
       <!--Top Kicks-->
<div class="container-fluid kick">
<h2 class="text-center"> Category 3</h2>
    <div class="row">
        <div class="col-md-12 subscribe">
            <div class="row">
            <?php $i = 4;
       foreach ($cat2 as $catwo) {
         if (++$i > 8) break; ?>
  
            <div class="col-md-3">
                    <div class="card border border-light rounded"> <a href="<?= Url::to(['site/index', 'eventId'=>$catwo->eventId])?>" >
                        <img src="<?= Yii::$app->request->baseUrl ?>/images/events/event-1.jpg"  class="img-fluid">

                        <button  class="btn btn-outline-info  centered">Buy Ticket</button>
                            <!-- modal btn -->
   
                <p></p>
            </a>
                 </div>
                 </a>
                    <h4 class="card-title"><?= $catwo['eventName'] ?></h4>
                </div>
                <?php } ?>
            
              </div>
       </div>
       </div>
       </div>
       <!--end-->