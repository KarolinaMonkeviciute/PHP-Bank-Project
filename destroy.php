<?php session_start();

$id = $_GET['id'] ?? 0;

$acc_list = unserialize(file_get_contents(__DIR__.'/data/acc.ser'));

foreach ($acc_list as $i => $acc){
    if($acc['id'] == $id){
        if($acc['balance'] == 0){
        unset($acc_list[$i]);
        break;
    }}
        
}

file_put_contents(__DIR__.'/data/acc.ser', serialize($acc_list));
$_SESSION['error'] = "Sąskaita ištrinta";
header('Location: http://localhost/bit/U2/list.php');