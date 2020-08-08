<?php
//include('config.php');
include('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'class/PHPMailer/src/Exception.php';
require 'class/PHPMailer/src/PHPMailer.php';
require 'class/PHPMailer/src/SMTP.php';

$utente_x = $_COOKIE['utente'];
$ut_array = explode(",", $utente_x);

$tempo = $_COOKIE['tempoT'];
$nmosse = $_COOKIE['mosse'];
//echo $tempo;

//var_dump($tempo);

?>

<div class="contenuto">

    <div class="topTitle">
        <span class="Tlt1">Complimenti sei riuscito a completare il gioco</span>
    </div>

    <?php
    $nome = htmlentities($ut_array[0], ENT_QUOTES, "UTF-8");
    $cognome = htmlentities($ut_array[1], ENT_QUOTES, "UTF-8");
    $email = htmlentities($ut_array[2], ENT_QUOTES, "UTF-8");
    $azienda = htmlentities($ut_array[3], ENT_QUOTES, "UTF-8");

    $dataoggi = date("d/m/Y", time());

    $fp = fopen("datarg.csv", "a+");
    if(!$fp) die ("Errore nella operaione con il file");
    fwrite($fp, $dataoggi."|".$nome."|".$cognome."|".$email."|".$azienda."|".$nmosse."|".$tempo."\n");
    fclose($fp);

    $messaggio = 'Messaggio email';

    //echo $messaggio;

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        //$mail->isSMTP();                                      // Set mailer to use SMTP
        //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        //$mail->SMTPAuth = true;                               // Enable SMTP authentication
        //$mail->Username = 'user@example.com';                 // SMTP username
        //$mail->Password = 'secret';                           // SMTP password
        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        //$mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('web@antimorubino.it', 'Antimo Rubino');
        //$mail->addAddress($email, $azienda);     // Add a recipient
        $mail->addAddress('web@antimorubino.it', 'Antimo Rubino');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('web@2ld.it');

        //Attachments
        //$mail->addAttachment("./ordini/ORW".$_SESSION['codCliente'].".txt");         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Complimenti, sei riuscito a completare il Gioco!!!";
        $mail->Body    = $messaggio;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        //echo "Email inviata correttamente<br /><br />";
        //echo '<a href="gioco.php" class="btn btn-danger btn-block">Vai al gioco</a>';


    } catch (Exception $e) {
        //echo 'Errore nell\'invio della mail: ', $mail->ErrorInfo;
        //echo $messaggio;
    }

    ?>

</div>



<?php include('footer.php'); ?>
