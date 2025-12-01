<?php
session_start();
if(!isset($_SESSION['ansatt_id'])){
    header('Location: index.html');
    exit;
}
?>
