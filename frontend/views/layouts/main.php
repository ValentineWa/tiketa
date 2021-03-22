<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand mx-4" href="#">TIKETA
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active ">
        <a class="nav-link " href="site/index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="site/allevent">This Weekend</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="site/allevent">Events</a>
      </li>
   
      <li class="nav-item">
        <a class="nav-link" href="site/about">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Event Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fa fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fa fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer foot">
    <div class="container ">
       <div class="row">
         <div class="col-md-4">
         <p><a href="site/index"><img src="<?= Yii::$app->request->baseUrl ?>/images/logo.png" width="160" height="160" class="rounded-circle"></a></p>
         <div class="social">
                            <a href="facebook.com"><i class="fa fa-facebook fa-2x mx-2"></i></a>
                            <a href="twitter.co#"><i class="fa fa-twitter fa-2x mx-2"></i></a>
                            <a href="instagram.com"><i class="fa fa-instagram fa-2x mx-2"></i></a>
                            <a href="dribble.com"><i class="fa fa-dribbble fa-2x mx-2"></i></a>
                 </div>  
         </div>
         <div class="col-md-4 mt-5">
         <h4> <i class="fa fa-phone fa-lg pr-2"></i>Phone:</h4>
         <h5 class="pl-4">1-677-124-44227</h5>
         <h4><i class="fa fa-envelope fa-lg mt-3 pr-2"></i>Email</h4>
                                <h5 class="pl-4">DJ.Music@gmail.com</h5>
                    
         </div>
         <div class="col-md-4 mt-5">
         <h4>Stay With me</h4>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
         </div>
       </div>
       <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 copy">
          <p><i class="fa fa-copyright" aria-hidden="true"></i>2020 Sam's Shoes In. All Rights Reserved.</p>
       
        </div>
        <div class="col-md-4">

        </div>
      </div>
    </div>
    
</footer>
       


<?php $this->endBody() ?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<?php $this->endPage() ?>
