<?php
require_once("db.php");
if (isset($_GET['idPrenotazioneElimina'])) {
    $id = $_GET['idPrenotazioneElimina'];

    $sql = "DELETE FROM tPrenotazione WHERE idPrenotazione =  '$id' ";
    $rec = mysqli_query($db_remoto, $sql) or die($sql . "<br>" . mysqli_error($db_remoto));


}
if (isset($_GET['idPrenotazioneConferma'])) {
    $idPren = $_GET['idPrenotazioneConferma'];

    $sqlConferma = " UPDATE tPrenotazione SET confermata = '1'WHERE idPrenotazione = '$idPren'; ";
    $rec = mysqli_query($db_remoto, $sqlConferma) or die($sql . "<br>" . mysqli_error($db_remoto));
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $diagnosi = $_POST['diagnosi'];
    $cura = $_POST['cura'];
    $prezzo = $_POST['prezzo'];
    $idPrenotazione = $_GET['idPrenotazione'];
    $sql_insert = "INSERT INTO tVisita (diagnosi, cura,idPrenotazione,prezzo)
        VALUES ('$diagnosi','$cura','$idPrenotazione','$prezzo');";
    $rec_insert = mysqli_query($db_remoto, $sql_insert) or die($sql . "<br>" . mysqli_error($db_remoto));

    $sql_nuovo = "UPDATE tPrenotazione
    SET confermata_dottore = '1'
    WHERE idPrenotazione = '$idPrenotazione';";
    $rec_nuovo = mysqli_query($db_remoto, $sql_nuovo) or die($sql . "<br>" . mysqli_error($db_remoto));
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dogtor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid p-5  text-dark">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-6">
                <h1 class="text-center">Visite confermate dal Segretario</h1>
                <a href="index.php" class="link-primary float-end">Logout</a>
                 <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ora</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Dettaglio</th>



                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `tPrenotazione` WHERE confermata = 1 AND confermata_dottore = 0;";
                        $rec = mysqli_query($db_remoto, $sql) or die($sql . "<br>" . mysqli_error($db_remoto));

                        while ($array = mysqli_fetch_array($rec)) {
                            $confermata = $array['confermata'];
                            if ($confermata == 1) {
                                $id = $array['idPrenotazione'];
                                $idPrenotazione = $array['idPrenotazione'];
                                $nomeAccompagnatore = $array['nomeAccompagnatore'];
                                $cognomeAccompagnatore = $array['cognomeAccompagnatore'];
                                $data = $array['data'];
                                $ora = $array['ora'];
                                $descrizione = $array['descrizione'];
                                echo "
                            <tr>
                            <td>" . $id . "</td>

                            <td>" . $nomeAccompagnatore . "</td>
                            <td>" . $cognomeAccompagnatore . "</td>
                            <td>" . $data . "</td>
                            <td>" . $ora . "</td>
                            <td>" . $descrizione . "</td>
                            <td><a href='visite_dettaglio.php?idPrenotazione=$idPrenotazione'</a>Dettaglio</td>
                          

                            </tr>
                            <tr>";
                            }
                        }




                        ?>
                    </tbody>
                </table>



                <div class="text-center mt-3">
                </div>
            </div>
            <div class="col">
            </div>
        </div>

    </div>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>

</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sintomo = $_POST['sintomo'];
    echo $sintomo;

    $sql_cerca_sintomo = "SELECT idSintomo from tSintomi WHERE nomeSintomo = '" . $sintomo . "' ";
    $rec_sintomo = mysqli_query($db_remoto, $sql_cerca_sintomo) or die($sql . "<br>" . mysqli_error($db_remoto));
    while ($array = mysqli_fetch_array($rec_sintomo)) {
        $idSintomo = $array['idSintomo'];
    }
    echo $idSintomo;



    $nome = $_POST['nome'];
    echo $nome;
    $cognome = $_POST['cognome'];
    echo $cognome;
    $data = $_POST['data'];
    echo $data;
    $ora = $_POST['ora'];
    echo $ora;
    $descrizione = $_POST['descrizione'];
    echo $descrizione;
    $urgenza = $_POST['urgenza'];
    echo $urgenza;


    $sql_insert = "INSERT INTO tPrenotazione (nomeAccompagnatore, cognomeAccompagnatore, data, ora, descrizione, confermata, idSintomo, urgenza) VALUES ('$nome', '$cognome', '$data', '$ora', '$descrizione', 0,'$idSintomo', '$urgenza' );";
    $rec = mysqli_query($db_remoto, $sql_insert) or die($sql . "<br>" . mysqli_error($db_remoto));
}

?>