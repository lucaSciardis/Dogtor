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
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <h1 class="text-center">Prenotazione</h1>
                <a href="index.php" class="link-primary text-center">Logout</a>


                <form action="prenotazione.php" method="post">
                    <div class="mb-3 mt-5">
                        <label for="exampleInputEmail1" class="form-label">Nome accompagnatore</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Cognome accompagnatore</label>
                        <input type="text" name="cognome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Data</label>
                        <input type="date" name="data" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ora</label>
                        <input type="time" name="ora" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Descrizione</label>
                        <input type="text" name="descrizione" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sintomi</label>
                        <select name="sintomo" id="sintomo" class='form-select' aria-label='Default select example'>


                            <?php
                            $sql = "SELECT * FROM tSintomi";
                            $rec = mysqli_query($db_remoto, $sql) or die($sql . "<br>" . mysqli_error($db_remoto));
                            while ($array = mysqli_fetch_array($rec)) {
                                $sintomoDue = $array['nomeSintomo'];
                                echo "
                            <option>" . $sintomoDue . "</option>";

                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Urgenza</label>
                        <select name="urgenza" id="urgenza" class='form-select' aria-label='Default select example'>
                            <option>si</option>
                            <option>no</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <h2 class="text-center">Info animale</h2>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome animale</label>
                        <input type="text" name="nome_animale" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Data di nascita</label>
                        <input type="date" name="data_animale" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Luogo nascita</label>
                        <input type="text" name="luogo_animale" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Microchip</label>
                        <input type="text" name="microchip" class="form-control">
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

    $nome_animale = $_POST['nome_animale'];
    echo $nome_animale;
    $data_nascita = $_POST['data_animale'];
    $luogo_nascita = $_POST['luogo_animale'];
    $chip = $_POST['microchip'];

    $sql_insert_animale = "INSERT INTO tAnimale (nome, dataNascita, luogoNascita, chip) VALUES ('$nome_animale', '$data_nascita', '$luogo_nascita', '$chip')";
    $rec_animale = mysqli_query($db_remoto, $sql_insert_animale) or die($sql . "<br>" . mysqli_error($db_remoto));


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


    $sql_insert = "INSERT INTO tPrenotazione (nomeAccompagnatore, cognomeAccompagnatore, data, ora, descrizione, confermata, idSintomo, urgenza,idAnimale) VALUES ('$nome', '$cognome', '$data', '$ora', '$descrizione', 0,'$idSintomo', '$urgenza', (SELECT MAX(idAnimale) from tAnimale) );";
    $rec = mysqli_query($db_remoto, $sql_insert) or die($sql . "<br>" . mysqli_error($db_remoto));


}
?>