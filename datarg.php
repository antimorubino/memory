<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#datarg').DataTable({
        "language": {
		    "sEmptyTable":     "Nessun dato presente nella tabella",
		    "sInfo":           "Vista da _START_ a _END_ di _TOTAL_ elementi",
		    "sInfoEmpty":      "Vista da 0 a 0 di 0 elementi",
		    "sInfoFiltered":   "(filtrati da _MAX_ elementi totali)",
		    "sInfoPostFix":    "",
		    "sInfoThousands":  ".",
		    "sLengthMenu":     "Visualizza _MENU_ elementi",
		    "sLoadingRecords": "Caricamento...",
		    "sProcessing":     "Elaborazione...",
		    "sSearch":         "Cerca:",
		    "sZeroRecords":    "La ricerca non ha portato alcun risultato.",
		    "oPaginate": {
		        "sFirst":      "Inizio",
		        "sPrevious":   "Precedente",
		        "sNext":       "Successivo",
		        "sLast":       "Fine"
		    },
		    "oAria": {
		        "sSortAscending":  ": attiva per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
		    }
		}
    });
} );
</script>

<title>Registration data</title>
</head>
<body>

<?php
$file = 'datarg.csv';
if(!is_readable($file)) {
    die('Il file non è leggibile!');
}
$rows = file($file);
//var_dump($rows);
?>

<div class="container-fluid mt-5">
    <table class="table" id="datarg">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th scope="col">Azienda</th>
                <th scope="col">N. Mosse</th>
                <th scope="col">Tempo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($rows as $row) {
            $colonna = explode('|', $row);
            ?>
            <tr>
                <td><?= $colonna[0]; ?></td>
                <td><?= $colonna[1]; ?></td>
                <td><?= $colonna[2]; ?></td>
                <td><?= $colonna[3]; ?></td>
                <td><?= $colonna[4]; ?></td>
                <td><?= $colonna[5]; ?></td>
                <td><?= $colonna[6]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
