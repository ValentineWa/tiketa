<?php
use common\models\Events;
use common\models\Ticketcategory;
/* @var $this yii\web\View */


// $catego = Events::find()->joinWith('ticketcategories')->all();

?>
<div class="site-about">
<!-- Event Description -->
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
      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.   </p>
   </div>
   <div class="locate">
    <h3><i class="fa fa-map-marker aicon fa-lg mr-4" aria-hidden="true"></i>Location</h3>
     <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
   </div>
   <div class="taim">
    <h3><i class="fa fa-clock-o aicon fa-lg mr-4" aria-hidden="true"></i>Time</h3>
    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
   </div>

   </div>
   </div>
   <!-- End Event Description -->
   <!-- Buy Ticket -->
   <!-- header -->
   <div class="container border border-right-0 border-left-0 mt-4 tiko pt-4">
   <div class="row">
    <h3 class="text-justify">GET YOUR TICKETS HERE</h3>
   </div>
   </div>
   <!-- header -->
   <div class="row mt-4 pt-4">
   <table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">TYPE</th>
      <th scope="col">Status</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">SubTotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Early Bird</th>
      <td>Sale Open</td>
      <td>KES.2000</td>
      <td class="param param-inline">
			 
			  <dd>
			  	<select  class="form-control form-control-sm quantity" style="width:70px;">
			  		<option> 1 </option>
			  		<option> 2 </option>
			  		<option> 3 </option>
			  	</select>
			  </dd>
			</dl> </td>
      <td>2</td>
    </tr>
    <tr>
      <th scope="row">Advance</th>
      <td>Sold Out</td>
      <td>Kes.3400</td>
      <td class="param param-inline">
			 
			  <dd>
			  	<select  class="form-control form-control-sm quantity" style="width:70px;">
			  		<option> 1 </option>
			  		<option> 2 </option>
			  		<option> 3 </option>
			  	</select>
			  </dd>
			</dl> </td>
      <td>2</td>
    </tr>
    
    <tr>
      <th scope="row">VIP</th>
      <td>Sold Out</td>
      <td>kes.45000</td>
      <td class="param param-inline">
			 
       <dd>
         <select  class="form-control form-control-sm quantity" style="width:70px;">
           <option> 1 </option>
           <option> 2 </option>
           <option> 3 </option>
         </select>
       </dd>
     </dl> </td>
      <td>2</td>
    </tr>

    <tr>
      <th scope="row" colspan="4">Total</th>
      
      <td>Kes.24000</td>
    </tr>
   
  </tbody>
</table>
</div>
<!-- End Ticket -->
<!-- payment option -->
<div class="row">
 <div class="col-md-6">
 <form>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter mpesa number">
    
  </div>
  <button type="submit" class="btn paym text-white">Mpesa Checkout</button>
  </form>
 </div>
 <div class="col-md-6">
 <button type="submit" class="btn paym text-white" >Pay withCard</button>
 
 </div>
</div>
<!-- end payment option -->
</div>
