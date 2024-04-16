<?php
session_start();
$host = 'localhost';
$db   = 'ifoa_blog';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];




$pdo = new PDO($dsn, $user, $pass, $options);

$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['password'] = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("
        SELECT * FROM user
        WHERE username = :username;
    ");

    $stmt->execute([
        'username' => $_POST['username'],
    ]);

    $user_from_db = $stmt->fetch();


    if ($user_from_db) {
        if (password_verify($_POST['password'], $user_from_db["password"])) {
            $_SESSION['user_id'] = $user_from_db['username'];

            header("Location: index.php");
            exit;
        }
    } else {
        $errors['credentials'] = 'Credenziali non valide';
    }


    $errors['credentials'] = 'Credenziali non valide';
}

include_once __DIR__  . "\includes\index-top.php"; ?>
<div class="container text-center">
    <h1 class="mt-5">BENVENUTO!</h1>

    <form class="row g-3" method="post" action="" novalidate>
        <div class="col-lg-12 col-xl-4">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExZjkyaHM5dXBmbTh3YnI5cG03cXl6b2kxcjZkbDdydXR0YWtnN2hteSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/EpWwx8QsQvSmSuDHUj/giphy.gif" alt="">
        </div>
        <div class="col-lg-12 col-xl-4 mt-5">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control " id="username" name="username" value="<?= $user['username'] ?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>


            <button class="btn btn-primary m-3" type="submit">Login</button><br>
            <a class="text-danger" href="register.php">Non sono registrato</a>
        </div>
        <div class="col-lg-12 col-xl-4">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExZjkyaHM5dXBmbTh3YnI5cG03cXl6b2kxcjZkbDdydXR0YWtnN2hteSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/EpWwx8QsQvSmSuDHUj/giphy.gif" alt="">
        </div>
    </form>
</div>
<?php include_once __DIR__  . "\includes\index-bottom.php"; ?>