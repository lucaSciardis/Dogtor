<?php
require_once("db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from tProprietario where email='$email' and password='$password'";
    $result = mysqli_query($db_remoto, $query);
    while ($array = mysqli_fetch_array($result)) {
        $username = $array['username'];
    }
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        header("Location: index.php?username=$username");
        exit;
    } else {
        echo "Login ERROR   "; }

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
                <a href="index.php" class="link-primary float-start">Home</a>
            </div>
            <div class="col-sm-4 text-center">
                <h1 class="text-center">LOGIN</h1>
                <img src="humor.png" class="mt-4" width="250" height="250">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" name='save' class="btn btn-dark">Submit</button>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
    </div>



</body>

</html>