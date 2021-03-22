<?php

namespace backend\controllers;

use Yii;
use common\models\Events;
use common\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Eventcategory;
use common\models\Poster;
use yii\web\UploadedFile;
use common\models\Ticketcategory;
use common\models\Cart;
use common\models\Cartitems;
 
/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['addposter', 'eventId' => $model->eventId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddposter($eventId)
    {
        $model = new \common\models\Poster();

        if ($model->load(Yii::$app->request->post()))
        {

           //generates images with unique names
            $imageName = bin2hex(openssl_random_pseudo_bytes(10));
            $model->imagePath = UploadedFile::getInstance($model, 'imagePath');
            //saves file in the root directory
            $model->imagePath->saveAs('uploads/.'.$imageName.'.'.$model->imagePath->extension);
            //save in the db
            $model->imagePath='uploads/'.$imageName.'.'.$model->imagePath->extension;
            $model->save();
        
            return $this->redirect(['index']);
        }
            return $this->render('addposter', [
                'model' => $model,
                'eventId' => $eventId,
            
               
             

            ]);
    }
  
public function actionEcategory()
    {
        $model = new \common\models\Eventcategory();

    
        if ($model->load(Yii::$app->request->post())) {
                       $model->save();
    
                return $this->redirect(['index']);
    
        }
    
        return $this->render('ecategory', [
            'model' => $model,
            
        ]);
    }
    public function actionScan()
    {
        return $this->render('scan');
    }

public function actionTcateg()
{
    $model = new \common\models\Ticketcategory();

    if ($model->load(Yii::$app->request->post())) {
        
        if ($model->load(Yii::$app->request->post())) {
            $model->save();

     return $this->redirect(['index']);

        }
    }

    return $this->render('tcateg', [
        'model' => $model,
    ]);
}


public function actionCart()
{
    return $this->render('cart');
}

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->eventId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
