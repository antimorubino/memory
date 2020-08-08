<?php
//include('config.php');
include('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'class/PHPMailer/src/Exception.php';
require 'class/PHPMailer/src/PHPMailer.php';
require 'class/PHPMailer/src/SMTP.php';
?>
<div class="contenuto">
    <p><strong>Clicca sulle caselle ed abbina le immagini uguali. Completa il gioco col minor numero di click e nel minor tempo possibile!!!</strong></p>

    <input id="mostra_cronometro" style="text-align:center;" value="00:00:00:0" disabled="disabled" class="form-control" />

    <button onclick="javascript:avvia();" class="btn btn-primary btn-block mt-3">Avvia il gioco!</button>
    <!--button onclick="javascript:ferma();" />STOP!</button>
    <button onclick="javascript:azzera();" />Azzera!</button-->
    <br /><br />

    <div id="board">

    <div>
		<span id="1"  title=""><img src="./images/icon/question.jpg"></span>
		<span id="2"  title=""><img src="./images/icon/question.jpg"></span>
		<span id="3"  title=""><img src="./images/icon/question.jpg"></span>
		<span id="4" title=""><img src="./images/icon/question.jpg"></span>
		<span id="5" title=""><img src="./images/icon/question.jpg"></span>
	</div>
	<div>
		<span id="6" title=""><img src="./images/icon/question.jpg"></span>
		<span id="7" title=""><img src="./images/icon/question.jpg"></span>
		<span id="8" title=""><img src="./images/icon/question.jpg"></span>
		<span id="9" title=""><img src="./images/icon/question.jpg"></span>
		<span id="10" title=""><img src="./images/icon/question.jpg"></span>
	</div>
	<div>
		<span id="11" title=""><img src="./images/icon/question.jpg"></span>
		<span id="12" title=""><img src="./images/icon/question.jpg"></span>
		<span id="13" title=""><img src="./images/icon/question.jpg"></span>
		<span id="14" title=""><img src="./images/icon/question.jpg"></span>
		<span id="15" title=""><img src="./images/icon/question.jpg"></span>
	</div>
	<div>
		<span id="16" title=""><img src="./images/icon/question.jpg"></span>
		<span id="17" title=""><img src="./images/icon/question.jpg"></span>
		<span id="18" title=""><img src="./images/icon/question.jpg"></span>
		<span id="19" title=""><img src="./images/icon/question.jpg"></span>
		<span id="20" title=""><img src="./images/icon/question.jpg"></span>
	</div>
    <strong><p id="countDisplay"></p></strong>
    <!--button id="restartButton" onclick="history.go(0)">Play Again</button-->
    </div>

    <div id="solved" class="mt-3">

    </div>
</div>
<?php include('footer.php'); ?>
