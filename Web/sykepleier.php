<?php include 'php/session_check.php'; ?>
<!DOCTYPE html>
<html lang="no">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Klumpen Kommune Vaksinasjonssystem</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Sykepleier</h1>
<a href="php/logout.php" style="float:right;">Logg ut</a>

<section id="avtaler" class="aktiv">
    <h2>Avtaler</h2>
    <table id="avtaleTabell">
        <thead>
            <tr><th>ID</th><th>Bruker</th><th>Stasjon</th><th>Dato</th><th>Klokkeslett</th><th>Handling</th></tr>
        </thead>
        <tbody></tbody>
    </table>
</section>

<script src="js/sykepleier.js"></script>
</body>
</html>
