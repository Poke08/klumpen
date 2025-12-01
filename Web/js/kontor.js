// js/kontor.js

// Hjelpefunksjon for å bytte mellom seksjoner
function vis(seksjonId){
    document.querySelectorAll('section').forEach(sec => sec.style.display = 'none');
    document.getElementById(seksjonId).style.display = 'block';
}

// Hent og vis brukere
function hentBrukere(){
    fetch('php/funksjoner.php?action=brukere')
        .then(res => res.json())
        .then(data => {
            let tbody = document.querySelector('#brukerTabell tbody');
            tbody.innerHTML = '';
            data.forEach(u => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${u.bruker_id}</td>
                                <td>${u.fornavn} ${u.etternavn}</td>
                                <td>${u.fodselsdato}</td>
                                <td>${u.telefon}</td>
                                <td>${u.epost}</td>
                                <td>
                                    <button onclick="slettBruker(${u.bruker_id})">Slett</button>
                                </td>`;
                tbody.appendChild(tr);
            });

            // Oppdater bruker-ID select for avtaler
            let brukerSelect = document.getElementById('bruker_id_select');
            brukerSelect.innerHTML = '';
            data.forEach(u => {
                let opt = document.createElement('option');
                opt.value = u.bruker_id;
                opt.textContent = `${u.fornavn} ${u.etternavn}`;
                brukerSelect.appendChild(opt);
            });
        });
}

// Hent og vis avtaler
function hentAvtaler(){
    fetch('php/funksjoner.php?action=avtaler')
        .then(res => res.json())
        .then(data => {
            let tbody = document.querySelector('#avtaleTabell tbody');
            tbody.innerHTML = '';
            data.forEach(a => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${a.avtale_id}</td>
                                <td>${a.fornavn} ${a.etternavn}</td>
                                <td>${a.stasjon}</td>
                                <td>${a.dato}</td>
                                <td>${a.klokkeslett}</td>
                                <td><button onclick="slettAvtale(${a.avtale_id})">Slett</button></td>`;
                tbody.appendChild(tr);
            });
        });
}

// Hent og vis ansatte
function hentAnsatte(){
    fetch('php/funksjoner.php?action=ansatte')
        .then(res => res.json())
        .then(data => {
            let tbody = document.querySelector('#ansattTabell tbody');
            tbody.innerHTML = '';
            data.forEach(a => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${a.ansatt_id}</td>
                                <td>${a.fornavn} ${a.etternavn}</td>
                                <td>${a.funksjon}</td>
                                <td>${a.opprettet}</td>`;
                tbody.appendChild(tr);
            });
        });
}

// Hent og vis vaksinerte
function hentVaksinerte(){
    fetch('php/funksjoner.php?action=vaksinerte')
        .then(res => res.json())
        .then(data => {
            let tbody = document.querySelector('#vaksinertTabell tbody');
            tbody.innerHTML = '';
            data.forEach(v => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${v.vaksine_id}</td>
                                <td>${v.bruker_fornavn} ${v.bruker_etternavn}</td>
                                <td>${v.ansatt_fornavn} ${v.ansatt_etternavn}</td>
                                <td>${v.stasjon}</td>
                                <td>${v.dato}</td>
                                <td>${v.klokkeslett}</td>`;
                tbody.appendChild(tr);
            });
        });
}

// Registrer ny bruker
document.getElementById('registrerBrukerForm').addEventListener('submit', e => {
    e.preventDefault();
    fetch('php/registrer_bruker.php', {
        method: 'POST',
        body: new FormData(e.target)
    })
    .then(res => res.text())
    .then(msg => {
        alert(msg);
        e.target.reset();
        hentBrukere();
    });
});

// Slett bruker
function slettBruker(id){
    if(confirm('Er du sikker på at du vil slette denne brukeren?')){
        fetch('php/slett_bruker.php', {
            method: 'POST',
            body: new URLSearchParams({ bruker_id: id })
        })
        .then(res => res.text())
        .then(msg => {
            alert(msg);
            hentBrukere();
            hentAvtaler();
        });
    }
}

// Registrer avtale
document.getElementById('registrerAvtaleForm').addEventListener('submit', e => {
    e.preventDefault();
    fetch('php/registrer_avtale.php', {
        method: 'POST',
        body: new FormData(e.target)
    })
    .then(res => res.text())
    .then(msg => {
        alert(msg);
        e.target.reset();
        hentAvtaler();
    });
});

// Slett avtale
function slettAvtale(id){
    if(confirm('Er du sikker på at du vil slette denne avtalen?')){
        fetch('php/slett_avtale.php', {
            method: 'POST',
            body: new URLSearchParams({ avtale_id: id })
        })
        .then(res => res.text())
        .then(msg => {
            alert(msg);
            hentAvtaler();
        });
    }
}

// Kjør ved innlasting
window.addEventListener('load', () => {
    hentBrukere();
    hentAvtaler();
    hentAnsatte();
    hentVaksinerte();
});
