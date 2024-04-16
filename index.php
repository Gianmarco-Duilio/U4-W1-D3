<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}
$username = $_SESSION["user_id"];

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

include_once __DIR__  . "\includes\index-top.php"; ?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a href="http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W1-D3/" class="navbar-brand">Homepage Shoes</a>
    <h1>benvenuto <?= $username ?></h1>

    <form class="d-flex" role="search" method="get" action="search.php">
      <a href="http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W1-D3/aggiungi.php" class="btn btn-primary me-2">+</a>

      <a href="logout.php" class="btn btn-primary me-2">Logout</a>


      <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
  <div class="row">




    <?php
    $limit = 2;
    $query = "SELECT count(*) FROM shoesshop";

    $s = $pdo->query($query);
    $total_results = $s->fetchColumn();
    $total_pages = ceil($total_results / $limit);

    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }



    $starting_limit = ($page - 1) * $limit;
    $show  = "SELECT * FROM shoesshop ORDER BY id DESC LIMIT ?,?";

    $r = $pdo->prepare($show);
    $r->execute([$starting_limit, $limit]);

    while ($res = $r->fetch(PDO::FETCH_ASSOC)) :



      echo "
      <div class='col'>
      <div class='my-3 g-3 card bg-dark-subtle border-0 shadow-lg  mb-5 bg-body-tertiary' >
                    <img src=$res[immagine] class='p-3 card-img-top'>
                       <div class='card-body'>
                        <h5 class='card-title'>$res[nome]</h5>
                        <p class='card-text'>$res[prezzo]$</p>
                         <div class='row justify-content-center'>
                             <div class='col-2'><a href='http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W1-D3/dettagli.php?id=$res[id]' class='btn btn-primary'>dettagli</a></div>
                             <div class='col-2'>  <a href='elimina.php?id=$res[id]'  class='btn btn-danger'>elimina</a></div>
                             <div class='col-2'> <a href='http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W1-D3/modifica.php?id=$res[id]' class='btn btn-success'>modifica</a></div>
                           </div>
                       
                      </div>  
                      </div>    
                      </div>";
    endwhile; ?>

    <div class="d-flex flex-row justify-content-center">
      <nav>
        <ul class="pagination">
          <li class="page-item">
            <?php for ($page = 1; $page <= $total_pages; $page++) : ?>


              <a href='<?php echo "?page=$page"; ?>' class="page-link"><?php echo $page; ?>
              </a>


            <?php endfor; ?>
          </li>
        </ul>
      </nav>
    </div>

  </div>
</div>
<?php include_once __DIR__  . "\includes\index-bottom.php"; ?>