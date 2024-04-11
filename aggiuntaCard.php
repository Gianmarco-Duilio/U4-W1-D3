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



$nome = $_POST['nome'];
$prezzo = $_POST['prezzo'];
$immagine = $_POST['immagine'];


$stmt = $pdo->query('SELECT * FROM shoesshop');

$stmt = $pdo->prepare("INSERT INTO shoesshop (immagine, nome, prezzo) VALUES (:immagine, :nome, :prezzo)");
$stmt->execute([
    'immagine' => $immagine,
    'nome' => $nome,
    'prezzo' => $prezzo,
]);

header('Locatio:Corso Epicode-Ifoa Back End\U4-W1-D3\index.php');
