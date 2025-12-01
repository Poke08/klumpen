<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$stmt = $pdo->prepare('INSERT INTO avtaler (bruker_id, stasjon, dato, klokkeslett) VALUES (?,?,?,?)');
if($stmt->execute([$_POST['bruker_id'], $_POST['stasjon'], $_POST['dato'], $_POST['klokkeslett']])){
    echo 'Avtale registrert';
} else echo 'Feil ved registrering';
?>
