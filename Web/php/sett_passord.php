<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');

$ansatt_id = $_POST['ansatt_id'] ?? '';
$passord = $_POST['passord'] ?? '';

if($ansatt_id && $passord){
    $hash = password_hash($passord, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('UPDATE ansatte SET passord=?, passord_satt=1 WHERE ansatt_id=?');
    if($stmt->execute([$hash, $ansatt_id])){
        echo 'Passord satt! Du kan nå logge inn med ditt nye passord.';
    } else {
        echo 'Feil ved opprettelse av passord.';
    }
} else {
    echo 'Ugyldig forespørsel.';
}
?>
