// js/sykepleier.js

// Hent og vis avtaler
function hentAvtaler(){
    fetch('php/funksjoner.php?action=avtaler')
        .then(res => res.json())
        .then(data => {
            let tbody = document.querySelector('#avtaleTabell tbody');
            tbody.innerHTML = '';
            data.forEach(a => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${a.avtale_id}</td><td>${a.fornavn} ${a.etternavn}</td><td>${a.stasjon}</td><td>${a.dato}</td><td>${a.klokkeslett}</td>
                <td><button onclick='gjennomfort(${a.avtale_id})'>Gjennomført</button></td>`;
                tbody.appendChild(tr);
            });
        });
}

function gjennomfort(avtale_id){
    let ansatt_id = prompt('Oppgi din ansatt-ID:');
    if(ansatt_id){
        fetch('php/gjennomfort.php', {
            method: 'POST',
            body: new URLSearchParams({ avtale_id: avtale_id, ansatt_id: ansatt_id })
        })
        .then(res => res.text())
        .then(msg => {
            alert(msg);
            hentAvtaler();
        });
    }
}

// Kjør ved innlasting
hentAvtaler();