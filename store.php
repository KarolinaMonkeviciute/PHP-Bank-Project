<?php
session_start();
$acc_list = file_get_contents(__DIR__.'/data/acc.ser');
$acc_list = unserialize($acc_list);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($acc_list as $arr){
        if(in_array($_POST['code'], $arr)){
            $_SESSION['error'] = 'Sąskaita tokiu asmens kodu jau egzistuoja!';
            header('Location: http://localhost/bit/U2/new.php');
            die;
        }
    }
    if(mb_strlen($_POST['fname']) <= 3){
        $_SESSION['error'] = 'Vardas turi būti igesnis nei 3 simboliai!';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(mb_strlen($_POST['lname']) <= 3){
        $_SESSION['error'] = 'Pavarde turi buti igesne nei 3 simboliai!';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(mb_strlen($_POST['code']) != 11){
        $_SESSION['error'] = 'Asmens kodą turi sudaryti 11 simbolių!';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(substr($_POST['code'], 0, 1) < 3 || substr($_POST['code'], 0, 1) > 6){
        $_SESSION['error'] = 'Neteisingas pirmas asmens kodo simbolis (nuo 3 iki 6)';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(substr($_POST['code'], 3, 1) != 0 && substr($_POST['code'], 3, 1) > 1){
        $_SESSION['error'] = 'Neteisingas asmens kodas (pirmas mėnesio skaičius)';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(substr($_POST['code'], 3, 1) == 1 && substr($_POST['code'], 4, 1) > 2){
        $_SESSION['error'] = 'Neteisingas asmens kodas (antras mėnesio skaičius)';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
    if(substr($_POST['code'], 4, 1) == 1 && substr($_POST['code'], 5, 1) > 2){
        $_SESSION['error'] = 'Neteisingas asmens kodas (pirmas dienos skaičius)';
        header('Location: http://localhost/bit/U2/new.php');
        die;
    }
        $new_acc = [
        'id' => rand(10000000, 99999999),
        'name' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'number' => $_POST['number'],
        'code' => $_POST['code'],
        'balance' => 0,
    ];
    $acc_list[] = $new_acc;
    file_put_contents(__DIR__.'/data/acc.ser', serialize($acc_list));
    $_SESSION['success'] = "Sąskaita sukurta";
    header('Location: http://localhost/bit/U2/list.php');
    exit;
    }
    