<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .delete {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
        .delete-container {
            width: 400px;
            height: 200px;
            border-radius: 10px;
            border: 2px solid crimson;
            color: crimson;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .delete-container div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            gap: 10px;
        }
    </style>
</head>
<body>
<?php require __DIR__.'/parts/alert.php'?>
<div class="delete">
        <div class="delete-container">
            <h2>Ar tikrai norite ištrinti?</h2>
            <div>
                <form action="http://localhost/bit/U2/destroy.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
                    <button type="submit" class="btn btn-outline-primary">Taip</button>
                </form>
                <a href="http://localhost/bit/U2/list.php" class="btn btn-outline-secondary">Ne</a>
            </div>
        </div>
    </div>
</body>
</html>