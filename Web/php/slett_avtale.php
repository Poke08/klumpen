<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$stmt = $pdo->prepare('DELETE FROM avtaler WHERE avtale_id=?');
if($stmt->execute([$_POST['avtale_id']])){
    echo 'Avtale slettet';
} else echo 'Feil ved sletting';
?>
