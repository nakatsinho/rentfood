var button = document.getElementById("mpesaButton");

if (button !== null) {
    document.head.insertAdjacentHTML('beforeend', '<link rel=stylesheet href="admin/mpesa/styles/style.css">');
    img = '<img style="width: 35px; display: inline; margin: -8px;" src= "admin/mpesa/images/mpesa.png">'
    btnMarkup = '<a href="" id="mpesaBtn" class="mpesaButton">' + img + '<span style="margin-left: 15px;">Pagar via M-Pesa</span></a>'
    phoneInstruction = '<strong><em> Enviaremos uma solicitação de pagamento M-Pesa para este número de telefone</em></stron>'
    form = '<form>\
        <label for="amount" class="mpesaLabel">Valor a Pagar</label><input class="mpesaInput" type="text" placeholder="Valor em Metical" name="valor" id="mpesaAmount"></input><br>\
        <label for="phone" class="mpesaLabel">Seu Numero com M-Pesa</label><input class="mpesaInput" type="text" placeholder="(+258) 845248888" name="contacto" id="mpesaPhoneNumber"></input><br>' + phoneInstruction + '<br><br><button href="" id="mpesaSend" class="mpesaButton" style="width: 100%;">' + img + '<span style="margin-left: 15px;">Pagar Agora</span></button></form>'
    formMarkup = '<div id="mpesaForm"><h3 class="mpesaHeader">Pagar via M-Pesa</h3>' + form + '</div>'
    button.innerHTML = btnMarkup

    success = '<div style="text-align: center;" class="animate-bottom">\
      <h2>√ Sucesso </h2>\
      <p>Uma solicitação de pagamento M-Pesa será enviada para o seu telefone em breve</p>\
    </div>'

    button.addEventListener('click', function (e) {
        e.preventDefault();
        formDiv = document.createElement('div')
        button.parentNode.insertBefore(formDiv, button.nextSibling);
        formDiv.innerHTML = formMarkup
        amountInput = document.getElementById("mpesaAmount")
        phoneInput = document.getElementById("mpesaPhoneNumber")
        phone = button.getAttribute('data-phone')
        amount = button.getAttribute('data-amount')
        url = button.getAttribute('data-url')
        amountInput.value = amount
        phoneInput.value = phone
        button.style.display = 'none';

        payButton = document.getElementById("mpesaSend")
        loaderDiv = document.createElement('div')
        loaderDiv.setAttribute("id", "loader");
        payButton.parentNode.insertBefore(loaderDiv, payButton.nextSibling);
        loader = document.getElementById("loader")
        loader.style.display = "none";
        loader.style.margin = '-75px 0 0 -110px';

        payButton.addEventListener('click', function (evt) {
            evt.preventDefault();
            payButton.disabled = true;
            document.getElementById('mpesaPhoneNumber').disabled = true;
            formDiv = document.getElementById('mpesaForm')
            if (url !== undefined) {
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", url, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('phone=' + phoneInput.value + '&amount=' + amountInput.value);
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        formDiv.innerHTML = success
                    }
                    else {
                        formDiv.innerHTML = 'Algo deu errado. Entre em contato com o desenvolvedor do site. Reporte o Erro: "+258 82 524 8888"'
                    }
                };
            } else {
                setTimeout(function () {
                    formDiv.innerHTML = 'Algo deu errado. Entre em contato com o desenvolvedor do site. Erro: "Nenhum URL especificado!"'
                }, 3000); 
            }
            loader.style.display = "";
        })
    })
}
