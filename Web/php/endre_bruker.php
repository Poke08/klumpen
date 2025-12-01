<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$stmt = $pdo->prepare('UPDATE brukere SET fornavn=?, etternavn=?, fodselsdato=?, telefon=?, epost=? WHERE bruker_id=?');
if($stmt->execute([$_POST['fornavn'], $_POST['etternavn'], $_POST['fodselsdato'], $_POST['telefon'], $_POST['epost'], $_POST['bruker_id']])){
    echo 'Bruker oppdatert';
} else echo 'Feil ved oppdatering';
?>
