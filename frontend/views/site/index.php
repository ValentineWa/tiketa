<?php
 use common\models\Poster;
 use common\models\Events;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$party = Events::find()->joinWith('posters')->all();
?>

<!-- image part -->

     <!-- end  -->
     <div class="container">
<div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Upcoming Events</h2>
                    </div>
                </div>
            </div>
            </div>
<!--Carousel Wrapper-->
<div id="multi-item-example w-100" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>  
    <!-- <li data-target="#multi-item-example" data-slide-to="3"></li> -->
 </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
    <?php $i = 0;
       foreach ($party as $shere) {
         if (++$i > 4) break; ?>
       

      <div class="col-md-3">
        <div class="card mb-2">
        <a href="<?= Url::to(['site/single', 'eventId'=>$shere->eventId])?>" >
        
          <img class="card-img-top"
      
          src="<?= '/../tiketa/backend/web/'.$shere->posters[0]->imagePath?>"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date"><?= $shere['evenDate'] ?></div></div>
          <div class="card-body">
            <h4 class="card-title"><?= $shere['eventName'] ?></h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i><?= $shere['location']?></p>
             </div>
        </div>
        </a>
      </div>

      <?php } ?>
<!-- 
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-2.jpg"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
          <div class="card-body">
            <h4 class="card-title">Coachella</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Uhuru Park, Nairobi.</p>
         
          </div>
        </div>
      </div> -->

      <!-- <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-3.jpg"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
          <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div> -->

      <!-- <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-1.jpg"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
          <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker maka pr-2" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div> -->

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
    <?php $i = 0;
       foreach ($party as $shere) {
         if (++$i > 4) break; ?>

      <div class="col-md-3">
        <div class="card mb-2">
        <a href="<?= Url::to(['site/single', 'eventId'=>$shere->eventId])?>" >
              <a href="<?= Url::to(['site/single', 'eventId'=>$shere->eventId])?>">
          <img class="card-img-top"
          src="<?= '/../tiketa/backend/web/'.$shere->posters[0]->imagePath?>"
            alt="Card image cap">

            <div class="middle">  <div class="tag-date"><?= $shere['evenDate'] ?></div></div>
          <div class="card-body">
            <h4 class="card-title"><?= $shere['eventName'] ?></h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i><?= $shere['location']?></p>
             </div>
        </div>
        </a>
      </div>

      <?php } ?>
<!-- 
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-3.jpg" alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
            <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-1.jpg"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
          <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div> -->
<!-- 
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-2.jpg" alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
            <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div> -->

    </div>
    <!--/.Second slide-->

    <!--Third slide-->
    <!-- <div class="carousel-item">

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-1.jpg" alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
            <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-2.jpg"
            alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
          <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-3.jpg" alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
            <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img class="card-img-top"
            src="<?= Yii::$app->request->baseUrl ?>/images/events/event-3.jpg" alt="Card image cap">
            <div class="middle">  <div class="tag-date">Dec 15, 2021</div></div>
            <div class="card-body">
          <h4 class="card-title">Summer Festival</h4>
            <p class="card-text"><i class="fa fa-map-marker pr-2 maka" aria-hidden="true"></i>Kasarani,Naiorbi County.</p>
            
          </div>
        </div>
      </div>

    </div> -->
    <!--/.Third slide-->

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
<!-- next container -->
<div class="container bg-light mt-4">
<div class="row">
<div class="col-md-6">
<img src="<?= Yii::$app->request->baseUrl ?>/images/about/about.png">
</div>
<div class="col-md-6">
<h4>TIKETA</h4>
<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
<p><button type="button" class="btn btn-secondary btn-lg baton rounded-0 mx-5 my-5" onclick="window.location.href='site/about'">Know Us</button></p>

</div>
</div>
</div>
<!-- end -->


<!-- category grid -->
<div class="container mt-4">
 <h2> EVENT CATEGORIES</h2>

<div class="row colum">
  <div class="column ">
 <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/about/ap-2.jpg"> </a>
 <a href="site/allevent">  <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/about/ap-7.jpg">
    <!-- <img src="<?= Yii::$app->request->baseUrl ?>/images/about/ap-6.jpg">
    <img src="<?= Yii::$app->request->baseUrl ?>/images/about/ap-5.jpg"> 
    -->
   
  </div>
  <div class="column">
  <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/blog/details/details-pic.jpg"></a>
  <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/blog/details/bs-1.jpg"></a>
 <!-- <img src="<?= Yii::$app->request->baseUrl ?>/images/blog/details/bs-3.jpg">
   <img src="<?= Yii::$app->request->baseUrl ?>/images/blog/blog-1.jpg"> -->

  </div>
  <div class="column">
  <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/blog/blog-2.jpg"></a>
  <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/blog/blog-3.jpg"></a>
  <!--<img src="<?= Yii::$app->request->baseUrl ?>/images/blog/blog-4.jpg">
   <img src="<?= Yii::$app->request->baseUrl ?>/images/blog/blog-5.jpg">
  -->
  </div>
  <div class="column">
  <a href="site/allevent"> <img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/blog/large-item.jpg"></a>
  <a href="site/allevent"><img class="categ" src="<?= Yii::$app->request->baseUrl ?>/images/discography/disco-1.jpg"> </a>
  <!--<img src="<?= Yii::$app->request->baseUrl ?>/images/discography/disco-2.jpg">
   <img src="<?= Yii::$app->request->baseUrl ?>/images/discography/disco-3.jpg"> -->

  </div>
</div> 

  </div>
<!-- end category grid -->

  <!--Subscribe section-->
  <div class="container-fluid bg-light mt-4">
  
  <div class="row">
      <div class="col-md-12 subscribe">
          <div class="row">

              <div class="col-md-4"></div>
            <div class="col-md-4 tex">
              <h1 >Subscribe to our newsletter to get the latest trends & news</h1>
                    <p>Join our database NOW!</p>
             <!-- <div class="row">
               
               <div class="col-md-5 ">
               <input type="text" placeholder="Name">
               </div>
               <div class="col-md-5 ">
               <input type="email" placeholder="Your e-mail">
               </div>

             </div> -->

              <p><button type="button" class="btn btn-outline baton rounded-0 btn-lg">Join Mailing List</button></p></div>
            <div class="col-md-4"></div>
      
      </div>
      </div>
  </div>
</div>
    <!--end-->

<!-- CONTAINER 6 -->
<div class="container mt-4">
<h2> YOUTUBE FEED</h2>
  <div class="row">

  <div class="col-md-4">
  <div class="card border-0 yutub">
  <!-- <img src="<?= Yii::$app->request->baseUrl ?>/images/youtube/youtube-1.jpg"> -->
  <iframe width="348" height="300" src="https://www.youtube.com/embed/Tjstd7lM4vY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <div class="card-body">
  <h4 class="card-title">NAIROBI EVENTS-COLOR FESTIVAL 2018</h4> 
</div>
</div>
</div>
  <div class="col-md-4 ">
  <div class="card border-0 yutub">
  <iframe width="348" height="300" src="https://www.youtube.com/embed/bpEsJH9YRTQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  

  <div class="card-body">
  <h4 class="card-title">ST PAUL'S UNIVERSITY|| VARSITY BONFIRE</h4> 
 </div>
 </div>
  </div>
  <div class="col-md-4">
  <div class="card border-0 yutub">
  <iframe width="348" height="300" src="https://www.youtube.com/embed/SOR7zf34Ff8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

  <div class="card-body">
  <h4 class="card-title">ST PAUL'S UNIVERSITY|| GALA NIGHT</h4> 
 
     </div>
</div>
</div>
    
  </div>

</div>
<!-- END CONTAINER 6 -->
