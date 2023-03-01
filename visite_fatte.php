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
            <div class="col">
            </div>
            <div class="col-6">
                <h1 class="text-center">Visite FATTE</h1>
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



                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `tPrenotazione` WHERE confermata_dottore = 1;";
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