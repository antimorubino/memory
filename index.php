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
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'GET'):
    ?>
    <form method="post">
        <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group">
            <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" name="azienda" class="form-control" placeholder="Azienda" required>
        </div>
        <div class="form-check">
            <input id="privacy" type="checkbox" required>
            <label for="privacy">Dichiaro di aver ricevuto le informazioni di cui all'art. 13 D.Lgs. 30.6.2003 n. 196 (in seguito, Codice Privacy) e dell'art. 13 Regolamento UE n. 2016/679 (in seguito, GDPR)</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Registrati</button>
    </form>
    <div class="text-center mt-3">
        <a href="privacy_it.html" target="_blank">Privacy (GDPR)</a>
    </div>
    <?php
    else:
    $nome = htmlentities($_POST['nome'], ENT_QUOTES, "UTF-8");
    $cognome = htmlentities($_POST['cognome'], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $azienda = htmlentities($_POST['azienda'], ENT_QUOTES, "UTF-8");

    $utente = $nome.','.$cognome.','.$email.','.$azienda;

    setcookie("utente", $utente, time()+3600);

    echo '<a href="gioco.php" class="btn btn-danger btn-block">Vai al gioco</a>';

    endif;
    ?>
</div>
<?php include('footer.php'); ?>
