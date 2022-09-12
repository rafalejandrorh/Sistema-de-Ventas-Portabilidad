    document.querySelector('#send').addEventListener('click', function(){

        let DN = document.querySelector('#DN').value;
        let NIP = document.querySelector('#NIP').value;
        let VIGNIP = document.querySelector('#VIGNIP').value;
        let FVC = document.querySelector('#FVC').value;
        let OFERTA = document.querySelector('#OFERTA').value;
        let ESTADO_CAV = document.querySelector('#ESTADO_CAV').value;
        let CAV = document.querySelector('#CAV').value;
        let NOMBRES_CLIENTE = document.querySelector('#NOMBRES_CLIENTE').value;
        let FECHA_NACIMIENTO = document.querySelector('#FECHA_NACIMIENTO').value;
        let CURP = document.querySelector('#CURP').value;
        let CONTACTO_1 = document.querySelector('#CONTACTO_1').value;
        let CONTACTO_2 = document.querySelector('#CONTACTO_2').value;
        let CORREO = document.querySelector('#CORREO').value;

        let url = "https://api.whatsapp.com/send?phone=&text=*Redes VNZ:* BPCDMX1V1150/BPCDMX1V1150H%0A*DN:* " + DN +"%0A*NIP:* "+ NIP +"%0A*Vigencia del NIP:* " + VIGNIP +"%0A*FVC:* " + FVC +"%0A*Oferta:* " + OFERTA + "%0A*Estado del CAV:* "+ ESTADO_CAV +"%0A*CAV:* "+ CAV +"%0A*Nombre Cliente:* "+ NOMBRES_CLIENTE +"%0A*Fecha de Nacimiento:* "+ FECHA_NACIMIENTO +"%0A*CURP:* "+ CURP +"%0A*Contacto 1:* "+ CONTACTO_1 +"%0A*Contacto 2:* "+ CONTACTO_2 +"%0A*Correo:* "+ CORREO;    

        window.open(url);
    })