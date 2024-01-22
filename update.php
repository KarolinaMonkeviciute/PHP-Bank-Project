<?php session_start();

$id = $_GET['id'] ?? 0;
$amount = $_POST['add'] ?? 0;
if(!$id){
    header('Location: http://localhost/bit/U2/list.php');
    exit;
}

$acc_list = unserialize(file_get_contents(__DIR__.'/data/acc.ser'));

foreach($acc_list as $i => $acc){
    if($id == $acc['id']){
        (int) $acc['balance'] += (int) $amount;
        $acc_list[$i] = $acc;
        break;
    }
}
file_put_contents(__DIR__.'/data/acc.ser', serialize($acc_list));
$_SESSION['success'] = "Suma pridėta";
header('Location: http://localhost/bit/U2/list.php');

