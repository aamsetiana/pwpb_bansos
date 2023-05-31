<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <title>Data Bansos</title>
</head>
<body>
    <?php
    include('class/Database.php');
    include('class/Bansos.php');
    include('class/Jenis.php');
    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
  <a class="navbar-brand">
      <img src="img/pict3.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bansos
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?file=bansos&aksi=tampil">Data Bansos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?file=jenis&aksi=tampil">Data Tipe Bantuan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(isset($_GET['file'])){
    include($_GET['file'].'.php');
    } else {
    echo '<h1 align="center">Selamat Datang</h1>';
    }
    ?>

    
    
</body>
</html>