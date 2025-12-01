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
<h1>Kontoransatt</h1>
<a href="php/logout.php" style="float:right;">Logg ut</a>

<nav>
    <button onclick="vis('brukere')">Brukere</button>
    <button onclick="vis('avtaler')">Avtaler</button>
    <button onclick="vis('ansatte')">Ansatte</button>
    <button onclick="vis('vaksinerte')">Vaksinerte</button>
</nav>

<section id="brukere" class="aktiv">
    <h2>Brukere</h2>
    <form id="registrerBrukerForm">
        <input type="text" name="fornavn" placeholder="Fornavn" required>
        <input type="text" name="etternavn" placeholder="Etternavn" required>
        <input type="date" name="fodselsdato" required>
        <input type="text" name="telefon" placeholder="Telefon">
        <input type="email" name="epost" placeholder="Epost">
        <button type="submit">Registrer ny bruker</button>
    </form>
    <table id="brukerTabell">
        <thead>
            <tr><th>ID</th><th>Navn</th><th>Fødselsdato</th><th>Telefon</th><th>Epost</th><th>Handling</th></tr>
        </thead>
        <tbody></tbody>
    </table>
</section>

<section id="avtaler">
    <h2>Avtaler</h2>
    <form id="registrerAvtaleForm">
        <select name="bruker_id" id="bruker_id_select"></select>
        <select name="stasjon">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <input type="date" name="dato" required>
        <input type="time" name="klokkeslett" required>
        <button type="submit">Registrer avtale</button>
    </form>
    <table id="avtaleTabell">
        <thead>
            <tr><th>ID</th><th>Bruker</th><th>Stasjon</th><th>Dato</th><th>Klokkeslett</th><th>Handling</th></tr>
        </thead>
        <tbody></tbody>
    </table>
</section>

<section id="ansatte">
    <h2>Ansatte</h2>
    <table id="ansattTabell">
        <thead><tr><th>ID</th><th>Navn</th><th>Funksjon</th><th>Registrert</th></tr></thead>
        <tbody></tbody>
    </table>
</section>

<section id="vaksinerte">
    <h2>Vaksinerte</h2>
    <table id="vaksinertTabell">
        <thead><tr><th>ID</th><th>Bruker</th><th>Ansatt</th><th>Stasjon</th><th>Dato</th><th>Klokkeslett</th></tr></thead>
        <tbody></tbody>
    </table>
</section>

<script src="js/kontor.js"></script>
</body>
</html>
