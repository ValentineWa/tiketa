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
$cat2 = Events::find()->where(['ecategoryId'=> 5])->joinWith('posters')->all();
$cat3 = Events::find()->where(['ecategoryId'=> 3])->joinWith('posters')->all();
$cat4 = Events::find()->where(['ecategoryId'=> 4])->joinWith('posters')->all();
?>
 <!--Top Kicks-->
<div class="container-fluid">
<h2 class="text-center">HIPHOP</h2>
    <div class="row">
        <div class="col-md-12 subscribe">
            <div class="row">
            <?php $i = 4;
       foreach ($cat1 as $catone) {
         if (++$i > 8) break; ?>
  
            <div class="col-md-3">
                    <div class="card border border-light rounded"> <a href="<?= Url::to(['site/index', 'eventId'=>$catone->eventId])?>" >
                    <img  src="<?= '/../tiketa/backend/web/'.$catone->posters[0]->imagePath?>"  class="img-fluid">
            </a>
                 </div>
                 </a>
                    <h4 class="card-title"><?= $catone['eventName'] ?></h4>
                    <p class="card-title"><?= $catone['description'] ?></p>
            
                </div>
                <?php } ?>
            
              </div>
       </div>
       </div>
       </div>
       <!--end-->
       <div class="container-fluid">
       <h2 class="text-center">GOSPEL</h2>
    <div class="row">
        <div class="col-md-12 subscribe">
            <div class="row">
            <?php $i = 4;
       foreach ($cat4 as $fo) {
         if (++$i > 8) break; ?>
  
            <div class="col-md-3">
                    <div class="card border border-light rounded"> <a href="<?= Url::to(['site/index', 'eventId'=>$fo->eventId])?>" >
                    <img  src="<?= '/../tiketa/backend/web/'.$fo->posters[0]->imagePath?>"  class="img-fluid">
            </a>
                 </div>
                 </a>
                    <h4 class="card-title"><?= $fo['eventName'] ?></h4>
                    <p class="card-title"><?= $fo['description'] ?></p>
            
                </div>
                <?php } ?>
            
              </div>
       </div>
       </div>
       </div>
       <!--end-->
       
       <!--Top Kicks-->
<div class="container-fluid kick">
<h2 class="text-center">GENGETONE</h2>
    <div class="row">
        <div class="col-md-12 subscribe">
            <div class="row">
            <?php $i = 4;
       foreach ($cat3 as $catwo) {
         if (++$i > 8) break; ?>
  
            <div class="col-md-3">
                    <div class="card border border-light rounded"> <a href="<?= Url::to(['site/index', 'eventId'=>$catwo->eventId])?>" >
                        <img  src="<?= '/../tiketa/backend/web/'.$catwo->posters[0]->imagePath?>"  class="img-fluid">
                            <!-- modal btn -->
            </a>
                 </div>
                 </a>
                    <h4 class="card-title"><?= $catwo['eventName'] ?></h4>
                    <p class="card-title"><?= $catwo['description'] ?></p>
                </div>
                <?php } ?>
            
              </div>
       </div>
       </div>
       </div>
       <!--end-->