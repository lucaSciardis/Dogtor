<?php
require_once("db.php");
if (isset($_GET['username'])) {
    echo "Benvenuto: " . $_GET['username'] . "";
} else {

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
            <div class="col-sm-4">
                <img src="logo_dogtor.png" width="120" height="120">

            </div>
            <div class="col-sm-4">
                <h1 class="text-center">Dogtor</h1>
            </div>
            <div class="col-sm-4">
                <a href="login.php" class="link-primary float-end">Login</a>
            </div>
        </div>

    </div>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <img src="logo_dogtor.png" class="float-center" width="300" height="300">
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>

</body>

</html>