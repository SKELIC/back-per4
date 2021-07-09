<?php
session_start();

include 'backend/config/config.inc.php';

$data = $mysqli->prepare('SELECT count(*) as total from leden');
$data->execute();

$inschrijvingen = $data->fetchColumn();

// var_dump($_SESSION['errors']);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Back 4</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
  body {
    background-image: url("assets/Glr.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .bg {
    width: 100%;
    background-image: url("assets/Glr.jpg");
    filter: blur(4px);
    -webkit-filter: blur(4px);
    height: 100%;
    background-position-y: 75%;
    background-repeat: no-repeat;
    background-size: cover;
    position: fixed;
  }
</style>

<body>
  <div class="bg"></div>
  <div class="col-5 mx-auto p-5">
    <img src="assets/logo.png" alt="GLR" class="mx-auto d-block w-25">
  </div>

  <div class="modal-content col-5 mx-auto p-5">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <a class="btn btn-info text-center mb-2 " style="margin-left: 30rem !important;" href="views/inschrijvingen.php">Inschrijvingen</a>
    <a class="btn btn-info text-center mb-5" style="margin-left: 30rem !important;" href="logout.php">Loguit</a>
    <?php
    } else {
    ?>
    <a class="btn btn-info text-center mb-5" style="margin-left: 30rem !important;" href="views/login.php">Login</a>
    <?php
    }
    ?>
    <!-- <form class="form" method="post" action="./index.php"> -->
    <?php
    if ($inschrijvingen == 10) {
    ?>
      <h1 for="" class="text-center mb-2">Sorry, er zijn al 10 leden ingeschreven</h1>
    <?php
    } else {
    ?>
      <h2 for="" class="text-center mb-2 ">Schrijf je in voor de wedstrijd!</h2>
      <h1 class="text-center mb-5 font-weight-bold"><?= $inschrijvingen; ?>/10</h1>
      <form method="post" action="backend/controllers/lid_nieuw_verwerk.php">
        <div class="form-group">
          <label for="my-textarea">Voornaam</label>
          <input type="text" class="form-control" name="voornaam" id="voornaam" placeholder="">
          <small name="emailError" id="emailError" class="form-text text-muted">
            <?php if (!empty($_SESSION['errors']['naam'])) : ?>
              <p class="alert alert-danger pl-3 py-1  alert-text fas fa-exclamation-triangle">
                <?= $_SESSION['errors']['naam']; ?>
              </p>
            <?php endif; ?>
          </small>
        </div>
        <div class="form-group">
          <label for="my-textarea">Achternaam</label>
          <input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="">
          <small name="emailError" id="emailError" class="form-text text-muted">
            <?php if (!empty($_SESSION['errors']['naam'])) : ?>
              <p class="alert alert-danger pl-3 py-1  alert-text fas fa-exclamation-triangle">
                <?= $_SESSION['errors']['naam']; ?>
              </p>
            <?php endif; ?>
          </small>
        </div>
        <div class="form-group">
          <label for="my-textarea">Geboortedatum</label>
          <input type="date" name="geboortedatum" placeholder="YYYY-MM-DD" class="form-control">
          <small name="emailError" id="emailError" class="form-text text-muted">
            <?php if (!empty($_SESSION['errors']['datum'])) : ?>
              <p class="alert alert-danger pl-3 py-1  alert-text fas fa-exclamation-triangle">
                <?= $_SESSION['errors']['datum']; ?>
              </p>
            <?php endif; ?>
          </small>
        </div>
        <div class="form-group">
          <label for="my-textarea">Telefoonnummer</label>
          <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" placeholder="061234567">
          <small name="emailError" id="emailError" class="form-text text-muted">
            <?php if (!empty($_SESSION['errors']['mobiel'])) : ?>
              <p class="alert alert-danger pl-3 py-1  alert-text fas fa-exclamation-triangle">
                <?= $_SESSION['errors']['mobiel']; ?>
              </p>
            <?php endif; ?>
          </small>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="">
          <small name="emailError" id="emailError" class="form-text text-muted">
            <?php if (!empty($_SESSION['errors']['email'])) : ?>
              <p class="alert alert-danger pl-3 py-1  alert-text fas fa-exclamation-triangle">
                <?= $_SESSION['errors']['email']; ?>
              </p>
            <?php endif; ?>
          </small>
        </div>

        <button type="submit" naam="add" id="add" class="btn btn-info text-center">Inschrijven</button>
      </form>
    <?php
    }
    ?>

    <p for="" class="text-center mt-5 text-secondary">&copy; Grafisch Lyceum Rotterdam 2021</p>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>