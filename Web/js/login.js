document.getElementById('loginForm').addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(e.target);

    fetch('php/login.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            // Første gangs login: passord ikke satt
            if(data.passord_satt === false){
                const ansattId = data.ansatt_id;
                let nyttPassord = prompt('Dette er første gangs login. Vennligst opprett et passord:');
                if(nyttPassord){
                    fetch('php/sett_passord.php', {
                        method: 'POST',
                        body: new URLSearchParams({ ansatt_id: ansattId, passord: nyttPassord })
                    })
                    .then(res => res.text())
                    .then(msg => {
                        alert(msg);
                        // Etter å ha satt passord, kan vi be brukeren logge inn på nytt
                        window.location.reload();
                    });
                }
            } else {
                // Passord er satt, normal innlogging
                if(data.funksjon === 'sykepleier'){
                    window.location.href = 'sykepleier.php';
                } else if(data.funksjon === 'kontoransatt'){
                    window.location.href = 'kontoransatt.php';
                }
            }
        } else {
            document.getElementById('melding').textContent = data.msg;
        }
    });
});
