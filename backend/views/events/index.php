<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';

?>
<div class="events-index">
<div class="row">
<div class="col-md-4">  <p>
        <?= Html::a('1.New Event Category', ['ecategory'], ['class' => 'btn btn-primary']) ?>
    </p></div>
<div class="col-md-4"> <p>
        <?= Html::a('2.Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p></div>
    <div class="col-md-4"> <p>
        <?= Html::a('4.Create Ticket', ['tcateg'], ['class' => 'btn btn-warning']) ?>
    </p></div>
    </div>

  
  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventId',
            'eventName',
            'description',
            'location',
            'time',
            //'ecategoryId',
            //'etype',
            //'createdAt',
            //'createdBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
