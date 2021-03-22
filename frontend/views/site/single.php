<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Events;
use common\models\Poster;
use common\models\Ticketcategory;
/* @var $this yii\web\View */


// $catego = Events::find()->joinWith('ticketcategories')->all();
$tik = Events::find()->joinWith('posters')->all();
?>
<div class="site-about">
<!-- Event Description -->

  <?php $i = 0;
       foreach ($tik as $tiko) {
         if (++$i > 1) break; ?>



   <div class="row">
   <div class="col-md-6">
   <div class="card" style="width: 40rem;">
   <img src="<?= Yii::$app->request->baseUrl ?>/images/about/ap-6.jpg" >
<!-- width="400" height="400" -->
   </div>
   </div>
   <div class="col-md-6">
   <div class="descrip">
    <h3><i class="fa fa-info aicon fa-lg mr-4" aria-hidden="true"></i>Description:</h3>
      <p><?= $tiko->description  ?>   </p>
   </div>
   <div class="locate">
    <h3><i class="fa fa-map-marker aicon fa-lg mr-4" aria-hidden="true"></i>Location</h3>
     <p><?= $tiko->location  ?></p>
   </div>
   <div class="taim">
    <h3><i class="fa fa-clock-o aicon fa-lg mr-4" aria-hidden="true"></i>Time</h3>
    <p> <?= $tiko->time  ?>
    <?= $tiko->evenDate  ?> </p>
   </div>
   <div class="row">
  
   <div class="col-md-6 quantity">
   <dl class="param param-inline">
			  <dt>Quantity: </dt>
			  <dd>
			  <select id="quantity_<?= $tiko->eventId?>" class="form-control form-control-sm quantity" style="width:70px;">
			  		<option> 1 </option>
			  		<option> 2 </option>
			  		<option> 2 </option>

			  				  	</select> 
			  </dd>
			</dl>  
       </div>
 
   <div class="col-md-6">
 
    <h3>Total</h3>
    <p>Kes. <?= $tiko->eventPrice  ?>
    
  
   </div>
   <a href="#"  baseUrl="<?= Yii::$app->request->baseUrl?>" eventid="<?= $tiko->eventId?>" userid="<?= Yii::$app->user->id?>" class="btn btn-lg btn-outline-primary text-uppercase addtocart"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
       
   </div>
 

   </div>
  
   </div>
   <?php }?>
   <!-- End Event Description -->
   



<!-- payment option -->
<div class="row">
 <div class="col-md-12">
 <form>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter mpesa number">
    
  </div>
  <button type="submit" class="btn paym text-white">Mpesa Checkout</button>
  <button type="button" class="btn btn-secondary btn-lg baton rounded-0 mx-5 my-5" onclick="window.location.href='site/viewpdf'">Mpesa Checkout</button></p>
   </form>
 </div>
 
</div>
<!-- end payment option -->
</div>
