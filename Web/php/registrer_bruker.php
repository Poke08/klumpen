<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$stmt = $pdo->prepare('INSERT INTO brukere (fornavn, etternavn, fodselsdato, telefon, epost) VALUES (?,?,?,?,?)');
if($stmt->execute([$_POST['fornavn'], $_POST['etternavn'], $_POST['fodselsdato'], $_POST['telefon'], $_POST['epost']])){
    echo 'Bruker registrert';
} else echo 'Feil ved registrering';
?>
