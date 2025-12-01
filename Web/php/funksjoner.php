<?php
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');
$action = $_GET['action'] ?? '';
header('Content-Type: application/json');

if($action == 'brukere'){
    $stmt = $pdo->query('SELECT * FROM brukere');
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif($action == 'avtaler'){
    $stmt = $pdo->query('SELECT a.avtale_id, a.bruker_id, a.stasjon, a.dato, a.klokkeslett, b.fornavn, b.etternavn
                         FROM avtaler a
                         JOIN brukere b ON a.bruker_id=b.bruker_id');
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif($action == 'ansatte'){
    $stmt = $pdo->query('SELECT * FROM ansatte');
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif($action == 'vaksinerte'){
    $stmt = $pdo->query('SELECT v.vaksine_id, b.fornavn as bruker_fornavn, b.etternavn as bruker_etternavn,
                         a.fornavn as ansatt_fornavn, a.etternavn as ansatt_etternavn, v.stasjon, v.dato, v.klokkeslett
                         FROM vaksinerte v
                         JOIN brukere b ON v.bruker_id=b.bruker_id
                         JOIN ansatte a ON v.ansatt_id=a.ansatt_id');
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
?>
