
$form = $('#form').calx();

/*Array para armazenar temporariamente os serviços adicionados à os*/
var servicos_adicionados = [];

/*Armazenará o resultado da verificação se o serviço já existe na os*/
var result_add = false;

/*Recupera o número de linhas (serviços) na tabela*/
$counter = $('table.table').find('tbody').children().length;


/*Bloco que adiciona no array "servicos_adicionados" os servicos já existentes na os*/
/*Caso o $counter seja maior que zero, significa que já existem servicos na os*/
if ($counter > 0) {

//    console.log('É maior');

    /*Recupera através do loop todos os servicos do input 'servico_descricao'*/
    $('#table_servicos tr').each(function () {

        /*Armazena na variável servico, o valor contido no input 'servico_descricao'*/
        var servico = $(this).find("input.servico_descricao").val();

        /*Armazena o resultado da verificação da existência do 'servico' no array 'servicos_adicionados'*/
        result_add = servicos_adicionados.includes(servico);

        /*Caso não exista (false), adiciona o servico no array 'servicos_adicionados'*/
        if (result_add == false) {

            /*Adiciona apenas servicos diferentes de 'undefined'*/
            if (typeof servico !== 'undefined') {
                servicos_adicionados.push(servico);
//                console.log(servicos_adicionados);
            }
        }

    });
}
/*Fim bloco que adiciona no array "servicos_adicionados" os servicos já existentes na os*/

$(document).ready(function () {

    /*Previne o submit do form com a tecla Enter*/
    $(window).keydown(function (event) {

        if ((event.keyCode == 13)) {

            event.preventDefault();
            return false;
        }

    });

    $("#buscar_servicos").autocomplete({

        source: function (request, response) {

            $.ajax({
                url: BASE_URL + 'ajax/servicos',
                dataType: "json",
                type: 'POST',
                data: {
                    term: request.term
                },
                success: function (data) {

                    if (data.response == "false") {

                        var result = [{
                                label: 'Serviço não encontrado',
                                value: response.term
                            }];
                        response(result);

                    } else {
                        response(data.message);
                    }
                },
            });
        },
        minLength: 1,
        select: function (event, ui) {

            /*Caso o serviço não seja encontrado, interrompe o seguimento*/
            if (ui.item.value === 'Serviço não encontrado') {
                return false;
            } else {
                var servico_id = ui.item.id;
                var servico_descricao = ui.item.value;
                var servico_preco = ui.item.servico_preco;
                servico_preco = servico_preco.replace('.', '');
                servico_preco = servico_preco.replace(',', '.');
                var i = ++$counter;
                var markup = '<tr>\
                    <td><input type="hidden" name="servico_id[]" value="' + servico_id + '" data-cell="A' + i + '" data-format="0" readonly></td>\
                    <td><input title="Descrição do servico" type="text" name="servico_descricao[]" value="' + servico_descricao + '" class="servico_descricao form-control form-control-user input-sm" data-cell="B' + i + '" readonly></td>\
                    <td><input title="Valor unitário do servico" name="servico_preco[]" value="' + servico_preco + '" class="form-control form-control-user input-sm text-right money pr-1" data-cell="C' + i + '" data-format="R$ 0,0.00" readonly></td>\
                    <td><input title="Digite a quantidade apenas em número inteiros" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="servico_quantidade[]" value="" class="qty form-control form-control-user text-center" data-cell="D' + i + '" data-format="0[.]00" required></td>\
                    <td><input title="Insira o desconto" name="servico_desconto[]" class="form-control form-control-user input-sm text-right" value="0" data-cell="E' + i + '" data-format="0,0[.]00 %" required></td>\
                    <td><input title="Valor total do servico selecionado" name="servico_item_total[]" class="form-control form-control-user input-sm text-right pr-1" data-cell="F' + i + '" data-format="R$ 0,0.00" data-formula="D' + i + '*(C' + i + '-(C' + i + '*E' + i + '))" readonly></td>\
                    <td class="text-center"><input type="hidden" name="valor_desconto_servico[]" data-cell="H' + i + '"  data-format="R$ 0,0.00" data-formula="((C' + i + '*D' + i + ')-F' + i + ')"><button title="Remover o servico" class="btn-remove btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></td>\
                </tr>';


                /*Início bloco que verifica se o serviço já foi adicionado à ordem*/
                result_add = servicos_adicionados.includes(servico_descricao);

                if (result_add == true) {
                    Swal.fire({
                        icon: 'info',
                        width: 300,
                        title: 'Opss!',
                        html: 'Esse serviço já foi adicionado',
                    })
                } else {
                    $("table tbody").append(markup);
                    servicos_adicionados.push(servico_descricao);
                }
                /*Fim bloco que verifica se o serviço já foi adicionado à os*/

                $("input.qty").keyup(function () {
                    $form.calx('calculate');
                    $("#buscar_servicos").val(""); //Limpa o input de busca de serviços
                });

                $form.calx('update');
                $form.calx('getCell', 'G2').setFormula('SUM(F1:F' + i + ')');
            }
        }

    });

    /*Refaz o cálculo da ordem antes de cadastrá-la*/
    $('#btn-cadastrar-venda').on('click', function () {
        $form.calx('calculate');
        $form.calx('getCell', 'G1').calculate();
    });

});


/*Deleta o servico da ordem*/
$('#lista_servicos').on('click', '.btn-remove', function () {

    var servico_to_remove = $(this).closest('tr').find("input.servico_descricao").val();

    $(this).parent().parent().remove();

    /*Deleta do array "servicos_adicionados" o servico já adicionado*/
    for (var aux = 0; aux < servicos_adicionados.length; aux++) {
        if (servicos_adicionados[aux] === servico_to_remove) {

            servicos_adicionados.splice(aux, 1);

        }
    }

    $form.calx('update');

});









