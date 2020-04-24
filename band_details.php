<?php
require 'backend/config/db.php';

$bandid = $_GET['id'];

$query = "SELECT * FROM bands WHERE id='$bandid'";

$resultaat = mysqli_query($link, $query);


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Band</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  </head>
  <body style="background-color: lightgray;">
      <div class="modal-content col-10 mx-auto p-5">
        <h1 for="" class="text-center">Info</h1><br>
        <table class="table table-striped table-hover">
        <?php
            if (mysqli_num_rows($resultaat) == 0) {
        ?>
                <p class="p-3 mb-2 text-white text-center bg-danger">Sorry! geen bands gevonden in de database</p>
        <?php
            } else {
        ?>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Bandnaam</th>
                    <th scope="col">Muzieksoort</th>
                    <th scope="col">Land</th>
                    <th scope="col">Aantal Leden</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
        <?php
                while ($rij = mysqli_fetch_array($resultaat)) {
        ?> 
                <tr>
                    <th><?=$rij['naam']; ?></td>
                    <td><?=$rij['muzieksoort']; ?></td>
                    <td><?=$rij['land']; ?></td>
                    <td><?=$rij['aantalLeden']; ?></td>
                    <td><?=$rij['info']; ?></td>
                </tr>
        <?php
                } 
        ?>
            </tbody>
        <?php
            }
        ?>
        </table>
        <a href="band_uitlees.php" name="bands" class="float-right btn btn-primary">Terug</a>
      </div>
  </body>
</html>