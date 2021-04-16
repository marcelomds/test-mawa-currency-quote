// Eventos Cotação Moedas

$(document).ready(function () {

    // Realizar CONVERSÃO de Moedas
    $('#btn-covert').click((event) => {
        event.preventDefault();
        // Pegar os Valores dos Selects e Inputs
        let currencyFrom = $("select[name='currency_from']").val();
        let currencyFromText = $('#currency_from option:selected').text();
        let currencyTo = $("select[name='currency_to']").val();
        let currencyToText = $('#currency_to option:selected').text();
        let price = $("input[name='price']").val();
        let priceResult = $("input[name='price_result']").val();

        // Tratando valores de Moedas IGUAIS
        if (price === ''|| currencyFrom === ''|| currencyTo === '') {
            alert('Preencha os Campos');
        }

        if (currencyFrom === currencyTo) {
            alert('Os Valores de Moedas não podem ser iguais');
        }

        // Preparar Tipo de Moeda para mandar para a URL
        let currencyFromCut = currencyFromText.split('(');
        for (let i = 1; i < currencyFromCut.length; i++) {
            currencyFromUrl = currencyFromCut[i].split(')')[0];
        }

        let currencyToCut = currencyToText.split('(');
        for (let i = 1; i < currencyToCut.length; i++) {
            currencyToUrl = currencyToCut[i].split(')')[0];
        }

        // REQUISIÇÃO AJAX NA API - CONVERSOR DE MOEDAS
        $.ajax({
            url: `https://economia.awesomeapi.com.br/last/${currencyFromUrl}-${currencyToUrl}`,
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                let values = Object.values(response);

                let lowValue = values[0].low;

                // Calcular Conversão
                priceResult = price * lowValue;

                // Mostrar Campos com RESULTADOS
                $('#card-currency-result').show()
                $('#price_result').val(priceResult);
                $('#tag-currency_from').html(currencyFromText);
                $('#tag-price').html(price);
                $('#tag-currency_to').html(currencyToText);
                $('#tag-price_result').html(priceResult);

            }
        })
    });


    // Limpar Campos no Formuçário
    $('#btn-clear-fields').click(() => {
        document.location.reload(true);
    })

})

