<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=klumpen_vaksine;charset=utf8','root','');

$ident = $_POST['ident'] ?? '';
$passord = $_POST['passord'] ?? '';

$stmt = $pdo->prepare('SELECT * FROM ansatte WHERE ansatt_id = ? OR epost = ? OR telefon = ? LIMIT 1');
$stmt->execute([$ident, $ident, $ident]);
$ansatt = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

if($ansatt){
    if($ansatt['passord_satt'] == 0){
        echo json_encode(['success' => true, 'passord_satt' => false, 'ansatt_id' => $ansatt['ansatt_id']]);
        exit;
    }
    elseif(password_verify($passord, $ansatt['passord'])){
        $_SESSION['ansatt_id'] = $ansatt['ansatt_id'];
        $_SESSION['funksjon'] = $ansatt['funksjon'];
        echo json_encode(['success' => true, 'passord_satt' => true, 'funksjon' => $ansatt['funksjon']]);
        exit;
    }
}
echo json_encode(['success' => false, 'msg' => 'Feil ID/epost/telefon eller passord']);
?>
