$form = $('#form').calx();

/*Array para armazenar temporariamente os produtos adicionados à venda*/
var produtos_adicionados = [];

/*Armazenará o resultado da verificação*/
var result_add = false;

/*Recupera o número de linhas (produtos) na tabela*/
$counter = $('table.table').find('tbody').children().length;

/*Bloco que adiciona no array "produtos_adicionados" os produtos já existentes na venda*/
/*Caso o $counter seja maior que zero, significa que já existem produtos na venda*/
if ($counter > 0) {

    /*Recupera através do loop todos os produtos do input 'produto_descricao'*/
    $('#table_produtos tr').each(function () {

        /*Armazena na variável produto, o valor contido no input 'produto_descricao'*/
        var produto = $(this).find("input.produto_descricao").val();

        /*Armazena o resultado da verificação da existência do 'produto' no array 'produtos_adicionados'*/
        result_add = produtos_adicionados.includes(produto);

        /*Caso não exista (false), adiciona o produto no array 'produtos_adicionados'*/
        if (result_add == false) {

            /*Adiciona apenas produtos diferentes de 'undefined'*/
            if (typeof produto !== 'undefined') {
                produtos_adicionados.push(produto);
            }
        }

    });
}
/*Fim bloco que adiciona no array "produtos_adicionados" os produtos já existentes na venda*/

$(document).ready(function () {

    /*Previne o submit do form com a tecla Enter*/
    $(window).keydown(function (event) {

        if ((event.keyCode == 13)) {

            event.preventDefault();
            return false;
        }

    });

    $("#buscar_produtos").autocomplete({

        source: function (request, response) {

            $.ajax({
                url: BASE_URL + 'ajax/produtos',
                dataType: "json",
                type: 'POST',
                data: {
                    term: request.term,
                },
                success: function (data) {

                    if (data.response == "false") {

                        var result = [{
                                label: 'Produto não encontrado',
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

            /*Caso o produto não seja encontrado, interrompe o seguimento*/
            if (ui.item.value === 'Produto não encontrado') {
                return false;
            } else {
                var produto_id = ui.item.id;
                var produto_descricao = ui.item.value;
                var produto_preco_venda = ui.item.produto_preco_venda;
                var produto_qtde_estoque = ui.item.produto_qtde_estoque;
                produto_preco_venda = produto_preco_venda.replace('.', '');
                produto_preco_venda = produto_preco_venda.replace(',', '.');
                var i = ++$counter;
                var markup = '<tr>\
                    <td><input type="hidden" name="produto_id[]" value="' + produto_id + '" data-cell="A' + i + '" data-format="0" readonly></td>\
                    <td><input title="Descrição do produto" type="text" name="produto_descricao[]" value="' + produto_descricao + '" class="produto_descricao form-control form-control-user input-sm" data-cell="B' + i + '" readonly></td>\
                    <td><input title="Valor unitário do produto" name="produto_preco_venda[]" value="' + produto_preco_venda + '" class="form-control form-control-user input-sm text-right money pr-1" data-cell="C' + i + '" data-format="R$ 0,0.00" readonly></td>\
                    <td><input title="Digite a quantidade apenas em número inteiros" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="produto_quantidade[]" value="" class="qty form-control form-control-user text-center" data-cell="D' + i + '" data-format="0[.]00" required></td>\
                    <td><input title="Insira o desconto" name="produto_desconto[]" class="form-control form-control-user input-sm text-right" value="0" data-cell="E' + i + '" data-format="0,0[.]00 %" required></td>\
                    <td><input title="Valor total do produto selecionado" name="produto_item_total[]" class="form-control form-control-user input-sm text-right pr-1" data-cell="F' + i + '" data-format="R$ 0,0.00" data-formula="D' + i + '*(C' + i + '-(C' + i + '*E' + i + '))" readonly></td>\
                    <td class="text-center"><input type="hidden" name="valor_desconto_produto[]" data-cell="H' + i + '"  data-format="R$ 0,0.00" data-formula="((C' + i + '*D' + i + ')-F' + i + ')"><button title="Remover o produto" class="btn-remove btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></td>\
                </tr>';

                /*Início bloco que verifica se o produto já foi adicionado à venda*/
                result_add = produtos_adicionados.includes(produto_descricao);

                if (result_add == true) {
                    Swal.fire({
                        icon: 'info',
                        width: 300,
                        title: 'Opss!',
                        html: 'Esse produto já foi adicionado',
                    })
                } else {
                    $("table tbody").append(markup);
                    produtos_adicionados.push(produto_descricao);
                }
                /*Fim bloco que verifica se o produto já foi adicionado à venda*/


                /*Início bloco que verifica se a quantidade inputada é maior que a disponibilidade em estoque*/
                $("input.qty").keyup(function () {

                    if (parseInt($(this).val()) > parseInt(produto_qtde_estoque)) {

                        Swal.fire({
                            icon: 'warning',
                            width: 300,
                            title: 'Desculpe!',
                            html: 'Só temos <strong><u>' + produto_qtde_estoque + '</u></strong> unidades em estoque',
                        })

                        $(this).val("");
                    }

                    $form.calx('calculate'); //Chama a função calculate após o input "qty"
                    $("#buscar_produtos").val(""); //Limpa o input de busca de produto
                });
                /*Fim bloco que verifica se a quantidade inputada é maior que a disponibilidade em estoque*/


                $form.calx('update');
                $form.calx('getCell', 'G2').setFormula('SUM(F1:F' + i + ')');
            }


        }

    });

    /*Realiza o cáuculo da venda antes de cadastrá-la*/
    $('#btn-cadastrar-venda').on('click', function () {
        $form.calx('calculate');
        $form.calx('getCell', 'G1').calculate();
    });

});


/*Deleta o produto da venda*/
$('#lista_produtos').on('click', '.btn-remove', function () {

    var produto_to_remove = $(this).closest('tr').find("input.produto_descricao").val();

    $(this).parent().parent().remove();

    /*Deleta do array "produtos_adicionados" o produto já adicionado*/
    for (var aux = 0; aux < produtos_adicionados.length; aux++) {
        if (produtos_adicionados[aux] === produto_to_remove) {

            produtos_adicionados.splice(aux, 1);

        }
    }

    $form.calx('update');
//    $form.calx('getCell', 'G1').calculate();

});









