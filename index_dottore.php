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
                <h1 class="text-center">Dottore</h1>
                <?php
                if (isset($_GET['username'])) {
                    echo "<h2 class='text-center '>Benvenuto " . $_GET['username'] . " </h2>";
                } else {
                }
                ?>
                <div class="text-center mt-3">
                    <img src="doctor.png" width="400" height="400">
                </div>

                <div class="text-center mt-1">
                    <a href="visite.php" class="btn btn-dark float-center mt-5" role="button">Visite</a>
                </div>
            </div>
            <div class="col-sm-4">
            <a href="index.php" class="link-primary float-end">Logout</a>
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