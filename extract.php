<?php session_start();?>

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
    <?php $id = $_GET['id'] ?? 0;
    $acc_list = unserialize(file_get_contents(__DIR__.'/data/acc.ser'));
    $acc = null;
    foreach($acc_list as $item){
        if($item['id'] == $id){
            $acc = $item;
            break;
        }
    }
    ?>
    <?php if(!$acc):?>
        <ul class="list-group list-group-flush">
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
        <?php
        usort($acc_list, function($a, $b) {
            return strnatcasecmp($a['lname'], $b['lname']);
        });
        foreach ($acc_list as $acc) : ?>
         <li class="list-group-item">
            <div class="container">
                <div class="row mb-2">
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
                    <div class="col-1">
                        <?= $acc['balance'] ?> EUR
                    </div>
                    <div class="col-3">
                    <form action="http://localhost/bit/U2/extrupdate.php?id=<?=$acc['id']?>" method="post">
                        <input style="width: 60%" type="text" name="extract" placeholder="Iveskite suma"></input>
                        <button type="submit" class="btn btn-outline-success custom-button" style="font-size: 12px">Nuskaičiuoti</button>
                    </form>
                </div>
            </div>
        </li>
   </ul> 
   <?php endforeach ?>

        <?php else:?>
            <form class="new-form" action="http://localhost/bit/U2/extrupdate.php?id=<?=$acc['id']?>" method="post">
            <input type="text" name="fname" value="<?=$acc['name']?>" disabled></input>
            <input type="text" name="lname" value="<?=$acc['lname']?>" disabled></input>
            <input type="text" name="balance" value="<?=$acc['balance']?>" disabled></input>
            <input type="text" name="extract" placeholder="Iveskite suma"></input>
            <button type="submit">Nuskaičiuoti</button>
        </form>
        <?php endif ?>
</body>
</html>