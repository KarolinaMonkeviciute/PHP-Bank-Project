<?php session_start();
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require __DIR__.'/parts/header.php';
    require __DIR__.'/parts/alert.php';
    ?>

<?php if (isset($error)): ?>
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>
    <form class="new-form"action="http://localhost/bit/U2/store.php" method="post">
    <input type="text" name="fname" placeholder="Vardas">
    <input type="text" name="lname" placeholder="Pavardė">
    <input type="text" name="number" placeholder="Sąskaitos numeris" value="<?='LT'.rand(100000000000000000, 999999999999999999)?>"readonly>
    <input type="text" name="code" placeholder="Asmens kodas">
    <button type="submit">Sukurti</button>
</form>
</body>
</html>