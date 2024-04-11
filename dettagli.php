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
 ?>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage-Shoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>
        Homepage Shoes
    </h1>
     <div class="container">
        <div class="row">
            <div class="col">
                  <?php 
                   echo "<div class='w-25 g-3 card' >
                    <img src=$row[immagine] class='card-img-top'>
                       <div class='card-body'>
                        <h5 class='card-title'>$row[nome]</h5>
                        <p class='card-text'>$row[prezzo]$</p>
                        <div class='row'>
                           <div class='col-2'> <a href='#' class='btn btn-success'>modifica</a></div>
                         </div>
                      </div>  
                      </div> "; 
                      ?>
                    
            </div>
        </div>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>