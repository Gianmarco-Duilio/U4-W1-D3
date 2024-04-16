<?php



$host = 'localhost';
$db   = 'epicodeifoa_shoes';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];


$pdo = new PDO($dsn, $user, $pass, $options);


$stmt = $pdo->query('SELECT * FROM shoesshop');

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM shoesshop WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

include_once __DIR__  . "\includes\index-top.php"; ?>


<div class="container">
  <div class="row">
    <h1 class="text-center pt-5">
      Dettagli
    </h1>
    <div class="col-5 d-flex m-auto ">

      <?php
      echo " <div class='my-3 g-3 card bg-dark-subtle border-0 shadow-lg  mb-5 bg-body-tertiary' >
                    <img src=$row[immagine] class='p-3 card-img-top'>
                       <div class='card-body'>
                        <h5 class='card-title'>$row[nome]</h5>
                        <p class='card-text'>$row[prezzo]$</p>
                        <div class='row'>
                           <div class='col-2'> <a href='http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W1-D3/modifica.php/?id=$row[id]' class='btn btn-success'>modifica</a></div>
                         </div>
                      </div>  
                      </div> ";
      ?>

    </div>
  </div>
</div>
<?php include_once __DIR__  . "\includes\index-bottom.php"; ?>