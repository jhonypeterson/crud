$(function () {
    function cleanForm() {
        $("#address").val("");
        $("#district").val("");
        $("#city").val("");
        $("#uf").val("");
    }
    $("#postcode").blur(function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep !== "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $("#address").val(dados.logradouro);
                        $("#number").val('');
                        $("#complement").val('');
                        $("#district").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } else {
                        cleanForm();
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                cleanForm();
                alert("Formato de CEP inválido.");
            }
        } else {
            cleanForm();
        }
    });
});