<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');

$avtale_id = $_POST['avtale_id'];
$ansatt_id = $_POST['ansatt_id'];

// Flytt avtale til vaksinerte
$stmt = $pdo->prepare('INSERT INTO vaksinerte (bruker_id, ansatt_id, stasjon, dato, klokkeslett)
                       SELECT bruker_id, ?, stasjon, dato, klokkeslett FROM avtaler WHERE avtale_id=?');
if($stmt->execute([$ansatt_id, $avtale_id])){
    $pdo->prepare('DELETE FROM avtaler WHERE avtale_id=?')->execute([$avtale_id]);
    echo 'Avtale gjennomført';
} else echo 'Feil ved gjennomføring';
?>
