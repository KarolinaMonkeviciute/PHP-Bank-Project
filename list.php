<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<?php require __DIR__.'/parts/header.php';
    require __DIR__.'/parts/alert.php';
    ?>

<?php $acc_list = unserialize(file_get_contents(__DIR__.'/data/acc.ser'));
usort($acc_list, function($a, $b) {
    return strnatcasecmp($a['lname'], $b['lname']);
});
?>

<ul class="list-group list-group-flush mt-3">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <b>Vardas</b>
                    </div>
                    <div class="col-2">
                    <b>Pavardė</b>
                    </div>
                    <div class="col-2">
                    <b>Sąskaitos numeris</b>
                    </div>
                    <div class="col-2">
                    <b>Asmens kodas</b>
                    </div>
                    <div class="col-3">
                    <b>Likutis</b>
                    </div>
                </div>
            </div>
        </li>
      <?php foreach ($acc_list as $acc) : ?>
         <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <?= $acc['name'] ?>
                    </div>
                    <div class="col-2">
                        <?= $acc['lname'] ?>
                    </div>
                    <div class="col-2">
                        <?= $acc['number'] ?>
                    </div>
                    <div class="col-2">
                        <?= $acc['code'] ?>
                    </div>
                    <div class="col-2">
                        <?= $acc['balance'] ?> EUR
                    </div>
                    <div class="col-2">
                        <a href="http://localhost/bit/U2/delete.php?id=<?=$acc['id'] ?>" class="btn btn-outline-danger btn-sm"><span class="material-symbols-outlined">delete</span></a>
                        <a href="http://localhost/bit/U2/add.php?id=<?=$acc['id'] ?>" class="btn btn-outline-success btn-sm"><span class="material-symbols-outlined">add</span></a>
                        <a href="http://localhost/bit/U2/extract.php?id=<?=$acc['id'] ?>" class="btn btn-outline-info btn-sm"><span class="material-symbols-outlined">remove</span></a>
                    </div>
                </div>
            </div>
        </li>
   <?php endforeach ?>  
</ul> 
</body>
</html>
