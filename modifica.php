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


$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM shoesshop WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

include_once __DIR__  . "\includes\index-top.php"; ?>


<h1 class="mb-3 text-center">
    Modify Shoes
</h1>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class='my-3 g-3 card bg-dark-subtle border-0 shadow-lg  mb-5 bg-body-tertiary'>
                <form action="modificaCard.php?id=<?= $id ?>" method="post" novalidate>

                    <label class="form-label" for="nome">nome</label><br>
                    <input type="text" name="nome" id="nome" placeholder="nome" class="border-0 rounded-2" value="<?= htmlspecialchars($row['nome']) ?>">
                    <br>
                    <br>
                    <label class="form-label" for="prezzo">prezzo</label><br>
                    <input type="number" name="prezzo" id="prezzo" class="border-0 rounded-2" value="<?= $row['prezzo'] ?>">
                    <br>
                    <br>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label">URL immagine</label>
                        <div class="input-group p-3">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" name="immagine" value="<?= htmlspecialchars($row['immagine']) ?>">
                        </div>
                    </div>

                    <br>
                    <br>
                    <button class='m-3 btn btn-primary'>Send</button>

            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__  . "\includes\index-bottom.php"; ?>