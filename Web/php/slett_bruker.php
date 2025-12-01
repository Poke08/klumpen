<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$stmt = $pdo->prepare('DELETE FROM brukere WHERE bruker_id=?');
if($stmt->execute([$_POST['bruker_id']])){
    echo 'Bruker slettet';
} else echo 'Feil ved sletting';
?>
