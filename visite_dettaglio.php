<?php
require_once("db.php");
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
            <div class="col-sm-4 mt-5">

            </div>
            <div class="col-sm-4">



                <?php
                if (isset($_GET['idPrenotazione'])) {
                    $idPrenotazione = $_GET['idPrenotazione'];
                    $sql = "SELECT * FROM `tPrenotazione`INNER JOIN tSintomi ON tPrenotazione.idSintomo = tSintomi.idSintomo WHERE idPrenotazione= '$idPrenotazione' ;";
                    $rec = mysqli_query($db_remoto, $sql) or die($sql . "<br>" . mysqli_error($db_remoto));
                    while ($array = mysqli_fetch_array($rec)) {
                        $nomeAccompagnatore = $array['nomeAccompagnatore'];
                        $cognomeAccompagnatore = $array['cognomeAccompagnatore'];
                        $data = $array['data'];
                        $ora = $array['ora'];
                        $descrizione = $array['descrizione'];
                        $nomeSintomo = $array['nomeSintomo'];
                    }
                    echo "<h1 class='text-center '>Dettaglio visita di</h1>";
                    echo "<h1 class='text-center text-warning'> $nomeAccompagnatore $cognomeAccompagnatore</h1>";
                    echo "<p class='fw-light fs-4'>Data:</p>";
                    echo "<p class='fw-bold  fs-4 text-warning'>$data</p>";
                    echo "<p class='fw-light fs-4'>Ora:</p>";
                    echo "<p class='fw-bold  fs-4 text-warning'>$ora</p>";
                    echo "<p class='fw-light fs-4'>Decrizione:</p>";
                    echo "<p class='fw-bold  fs-4 text-warning'>$descrizione</p>";
                    echo "<p class='fw-light fs-4'>Sintomo:</p>";
                    echo "<p class='fw-bold  fs-4 text-warning'>$nomeSintomo</p>";
                }
                echo "<form action='visite.php?idPrenotazione=$idPrenotazione' method='post'>";
                ?>
                <div class="mb-3 mt-5">
                    <label for="exampleInputEmail1" class="form-label">
                        <p class='fw-bold  fs-4 '>Inserisci diagnosi </p>
                    </label>
                    <input type="text" name="diagnosi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <p class='fw-bold  fs-4 '>Inserisci cura</p>
                    </label>
                    <input type="text" name="cura" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <p class='fw-bold  fs-4 '>Inserisci prezzo</p>
                    </label>
                    <input type="number" name="prezzo" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark ">Submit</button>
                </div>
                </form>
                <div class="text-center mt-3">
                </div>
            </div>
            <div class="col-sm-4">

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