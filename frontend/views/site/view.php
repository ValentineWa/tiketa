<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Events;
use common\models\Poster;
use common\models\Ticketcategory;
?>


        <input type="hidden" id="valor" value="facebook.com">
        <button onClick="createQrCode()">Gerar QR Code</button>
        <div id="qrcode"></div>

    <script>
    
    function createQrCode()
    {
        var userInput = document.getElementById('valor').value;

        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 256,
            height: 256,
            colorDark: "black",
            colorLight: "white",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
    
    </script>