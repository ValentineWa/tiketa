<?php

use yii\helpers\Html;

$this->title = 'Events';

?>
<div class="container">
   <div class="row">
   <div class="col-md-2">
   <div class="card">
   <h4>Scan ticket here</h4>
   <h4>Enjoy the event</h4>
   </div>
   </div>

   <div class="col-md-4">
   
   <video id="preview"></video>
   
   </div>
   <div class="col-md-6">
   
   </div>
   </div>
</div>




<script>
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        alert(content);
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>

  
