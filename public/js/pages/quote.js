$(document).ready(function () {
// Eventos Cotação Moedas

    // Listar TODAS as MOEDAS
    $.ajax({
        url: 'https://economia.awesomeapi.com.br/xml/available/uniq',
        type: 'GET',
        dataType: 'xml',
        success: (xml) => {
            var obj = {};
            if (xml.children.length > 0) {
                for (var i = 0; i < xml.children.length; i++) {
                    let item = xml.children.item(i);
                    var nodeName = item.nodeName;

                    if (typeof (obj[nodeName]) == "undefined") {
                        obj[nodeName] = xml2json(item);
                    } else {
                        if (typeof (obj[nodeName].push) == "undefined") {
                            var old = obj[nodeName];

                            obj[nodeName] = [];
                            obj[nodeName].push(old);
                        }
                        obj[nodeName].push(xml2json(item));
                    }

                    const objXML = obj.xml;

                    let selectValue = Object.keys(objXML);
                    let selectText = Object.values(objXML);

                    for (var i = 0; i < selectValue.length; i++) {

                        let optionValue = `<option value="${selectText[i]} (${selectValue[i]})">`+ `${selectText[i]} (${selectValue[i]})` + "</option>";

                        $('#currency_from').append(optionValue);
                    }
                }
            }
        }
    })

    // CONVERSÃO de XML para JSON
    function xml2json(xml) {
        try {
            var obj = {};
            if (xml.children.length > 0) {
                for (var i = 0; i < xml.children.length; i++) {
                    var item = xml.children.item(i);
                    var nodeName = item.nodeName;

                    if (typeof (obj[nodeName]) == "undefined") {
                        obj[nodeName] = xml2json(item);
                    } else {
                        if (typeof (obj[nodeName].push) == "undefined") {
                            var old = obj[nodeName];

                            obj[nodeName] = [];
                            obj[nodeName].push(old);
                        }
                        obj[nodeName].push(xml2json(item));
                    }
                }
            } else {
                obj = xml.textContent;
            }
            return obj;
        } catch (e) {
            console.log(e.message);
        }
    }

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

        // Tratando valores de MOEDAS
        if (price === '' || currencyFrom === '' || currencyTo === '') {
            $('#error-empty').show();
            return false;
        }

        if (currencyFrom === currencyTo) {
            $('#error-currency').show();
            return false;
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
                $('#price_result').val(priceResult.toFixed(4));
                $('#tag-currency_from').html(currencyFromText);
                $('#tag-price').html(price);
                $('#tag-currency_to').html(currencyToText);
                $('#tag-price_result').html(priceResult.toFixed(4));
            },
            error: (error) => {
                $('#error-currency-notFound').show();
                $('#error-currency-notFound').delay(1800).fadeOut(200, () => {
                    document.location.reload(true);
                });
            }
        })
    });

    // Limpar Campos no Formuçário
    $('#btn-clear-fields').click(() => {
        document.location.reload(true);
    })

})

