<?php


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

if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("
        SELECT * FROM users
        WHERE id = :user_id;
    ");

    $stmt->execute([
        'user_id' => $_SESSION['user_id'],
    ]);

    $user_from_db = $stmt->fetch();
}



$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['email'] = $_POST['email'] ?? '';
$user['password'] = $_POST['password'] ?? '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO user  (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute([
        'username' => $_POST['username'],
        'email'    => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ]);

    header("Location: login.php");
    exit;
}

include_once __DIR__  . "\includes\index-top.php"; ?>



<div class="container text-center">
    <h1 class="mt-5">Registrati!</h1>
    <form class="row g-3" method="post" action="">
        <div class="col-lg-12 col-xl-4"><img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHowMWt1anA4eHpmYjFldG84Ymhqam80dzh5cHluaG94OHJtd2d2YyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/jqIDpMiGrS0MsCrfGj/giphy.gif" alt=""></div>
        <div class="col-lg-12 col-xl-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control " id="username" name="username" value="<?= $user['username'] ?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>

            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control " id="email" name="email" value="<?= $user['email'] ?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>



            <button class="btn btn-primary m-3" type="submit">Registrami</button>
        </div>
        <div class="col-lg-12 col-xl-4"><img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHowMWt1anA4eHpmYjFldG84Ymhqam80dzh5cHluaG94OHJtd2d2YyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/jqIDpMiGrS0MsCrfGj/giphy.gif" alt=""></div>
    </form>
</div>
<?php include_once __DIR__  . "\includes\index-bottom.php"; ?>