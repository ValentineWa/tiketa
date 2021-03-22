<?php

namespace frontend\controllers;

use Yii;
use common\models\Mpesac2bcallbacks;
//use frontend\models\MpesaC2bCallbacks;


class XyzController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     * @throws \yii\web\BadRequestHttpException
     */
	public function beforeAction($action)
	{
		if ($action->id == 'validate' || $action->id == 'confirm') {
			$this->enableCsrfValidation = false;
		}
	
		return parent::beforeAction($action);
	}
	
	/**
	 * Action register
	 */
	public function actionRegister(){


        header("Content-Type:application/json");
        $shortcode='601378';
        $consumerkey    ="r51znrL5gElKFiWxUNFP2eDGowi45GTx";
        $consumersecret ="xXY8dVegLHT2p3Ob";
        $validationurl="https://57d3faeedc1b.ngrok.io/xyz/validate?token=KUstudents51234567qwerty";
        $confirmationurl="https://57d3faeedc1b.ngrok.io/xyz/confirm?token=KUstudents51234567qwerty";
        /* testing environment, comment the below two lines if on production */
        $authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        /* production un-comment the below two lines if you are in production */
  //      $authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  //      $registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $credentials= base64_encode($consumerkey.':'.$consumersecret);
        $username=$consumerkey ;
        $password=$consumersecret;
        // Request headers
        $headers = array(
            'Content-Type: application/json; charset=utf-8'
        );
        // Request
        $ch = curl_init($authenticationurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
        curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password); // HTTP Basic Authentication
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
//        var_dump($result);exit();
        $access_token=$result->access_token;
        curl_close($ch);

        //Register urls
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $registerurl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'ShortCode' => $shortcode,
            'ResponseType' => 'Cancelled',
            'ConfirmationURL' => $confirmationurl,
            'ValidationURL' => $validationurl
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        echo $curl_response;

	}
	
	/**
	 * Action validate
	 */
		
    public function actionValidate()
    {
    	header("Content-Type:application/json");
    	
       	if (!isset($_GET["token"]))
    	{
    		echo "Technical error";
    		exit();
    	}
    	
    	if ($_GET["token"]!='KUstudents51234567qwerty')
    	{
    		echo "Invalid authorization";
    		exit();
    	}
    	
         echo '{"ResultCode":0, "ResultDesc":"Success", "ThirdPartyTransID": 01232}';
    }
    
    /**
     * Action confirm
     */
    
    public function actionConfirm()
    {
    	header("Content-Type:application/json");
    	
    	if (!isset($_GET["token"]))
    	{
    		echo "Technical error";
    		exit();
    	}
    	
    	if ($_GET["token"]!='KUstudents51234567qwerty')
    	{
    		echo "Invalid authorization";
    		exit();
    	}
    	
    	if (!$request=file_get_contents('php://input'))
    	
    	{
    		echo "Invalid input";
    		exit();
    	}
    	
    	
    	$this->SaveData($request);
    }

    // public function SaveData($request){

    // 	$model = New Mpesac2bcallbacks();
    // 	$request = json_decode($request,true);


    // 	$model->MerchantRequestID = $request['Body']['stkCallback']['MerchantRequestID'];
    
    //     $model->CheckoutRequestID = $request['Body']['stkCallback']['CheckoutRequestID'];
    // 	$model->ResultCode = $request['Body']['stkCallback']['ResultCode'];
    // 	$model->ResultDesc = $request['Body']['stkCallback']['ResultDesc'];

	//      	if ($request['Body']['stkCallback']['ResultDesc'] == 0){

	//      	 	$model->transAmount = $request['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
	//      		$model->MpesaReceiptNumber = $request['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
	//       		$model->TransactionDate = ''.$request['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'].'';
 	//      		$model->PhoneNumber = ''.$request['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'].'';

 	//      		//\Yii::$app->db->createCommand("UPDATE MpesaStkRequests SET complete = 0, status = 'Confirmed' WHERE MerchantRequestID =".$model->MerchantRequestID = $request['Body']['stkCallback']['MerchantRequestID'])->execute();
 	//     	}

 	// 			$model->save();

    // }
    public function SaveData($request){
        
        $model = New Mpesac2bcallbacks();
        $request = json_decode($request,true);
        
        
        $model->MerchantRequestID = 'Test';//$request['Body']['stkCallback']['MerchantRequestID'];
        $model->CheckoutRequestID = 'Test';//$request['Body']['stkCallback']['CheckoutRequestID'];
        $model->request = json_encode($request);
        $model->ResultCode = '123';//$request['Body']['stkCallback']['ResultCode'];
        $model->ResultDesc = 'Test';//$request['Body']['stkCallback']['ResultDesc'];
        if ($request['Body']['stkCallback']['ResultDesc'] == 0){
            $model->transAmount ='0.00';// $request['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
            $model->MpesaReceiptNumber ='Test';// $request['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            $model->TransactionDate ='Test'; //''.$request['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'].'';
            $model->PhoneNumber ='Test'; //''.$request['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'].'';
        }
        
        $model->save(); 
        
    }
    
    public function actionTimeout()
    {
        header("Content-Type:application/json");

//        if (!isset($_GET["token"]))
//        {
//            echo "Technical error";
//            exit();
//        }
//
//        if ($_GET["token"]!='KUstudents51234567qwerty')
//        {
//            echo "Invalid authorization";
//            exit();
//        }
//
//        if (!$request=file_get_contents('php://input'))
//
//        {
//            echo "Invalid input";
//            exit();
//        }
//

//        $this->SaveData($request);
    }
    



    
 }
