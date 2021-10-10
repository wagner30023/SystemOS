<?php
/*
SYSTEM OS - VISAOTEC SISTEMAS
------------------------------
By: Isaias de Oliveira
E-mail: visaotec.com@gmail.com
Todos os direitos reservados
*/
defined('BASEPATH') OR exit('Ação não permitida');

class Vendas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou! Por favor realize seu login novamente');
            redirect('login');
        }

        $this->load->model('vendas_model');
        $this->load->model('produtos_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Vendas cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'vendas' => $this->vendas_model->get_all(),
        );

//        echo '<pre>';
//        print_r($data['vendas']);
//        exit();

        $this->load->view('layout/header', $data);
        $this->load->view('vendas/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('venda_cliente_id', '', 'required');
        $this->form_validation->set_rules('venda_tipo', '', 'required');
        $this->form_validation->set_rules('venda_forma_pagamento_id', '', 'required');
        $this->form_validation->set_rules('venda_vendedor_id', '', 'required');


        if ($this->form_validation->run()) {

            $venda_valor_total = str_replace('R$', "", trim($this->input->post('venda_valor_total')));

            $data = elements(
                    array(
                'venda_cliente_id',
                'venda_forma_pagamento_id',
                'venda_tipo',
                'venda_vendedor_id',
                'venda_valor_desconto',
                'venda_valor_total',
                    ), $this->input->post()
            );

            $data['venda_valor_total'] = trim(preg_replace('/\$/', '', $venda_valor_total));

            $data = html_escape($data);

            $this->core_model->insert('vendas', $data, TRUE);

            $id_venda = $this->session->userdata('last_id');

            $produto_id = $this->input->post('produto_id');
            $produto_quantidade = $this->input->post('produto_quantidade');
            $produto_desconto = str_replace('%', '', $this->input->post('produto_desconto'));

            $produto_preco_venda = str_replace('R$', '', $this->input->post('produto_preco_venda'));
            $produto_item_total = str_replace('R$', '', $this->input->post('produto_item_total'));

            $produto_preco = str_replace(',', '', $produto_preco_venda);
            $produto_item_total = str_replace(',', '', $produto_item_total);


            $qty_produto = count($produto_id);




            for ($i = 0; $i < $qty_produto; $i++) {

                $data = array(
                    'venda_produto_id_venda' => $id_venda,
                    'venda_produto_id_produto' => $produto_id[$i],
                    'venda_produto_quantidade' => $produto_quantidade[$i],
                    'venda_produto_valor_unitario' => $produto_preco_venda[$i],
                    'venda_produto_desconto' => $produto_desconto[$i],
                    'venda_produto_valor_total' => $produto_item_total[$i],
                );

                $data = html_escape($data);

                $this->core_model->insert('venda_produtos', $data);

                /* Início atualização estoque */

                $produto_qtde_estoque = 0;

                $produto_qtde_estoque += intval($produto_quantidade[$i]);

                $produtos = array(
                    'produto_qtde_estoque' => $produto_qtde_estoque,
                );

                $this->produtos_model->update($produto_id[$i], $produto_qtde_estoque);

                /* Fim atualização estoque */
            }//Fim for
            redirect('vendas/imprimir/' . $id_venda);
        } else {

            //Erro de validação

            $data = array(
                'titulo' => 'Cadastrar venda',
                'styles' => array(
                    'vendor/select2/select2.min.css',
                    'vendor/autocomplete/jquery-ui.css',
                    'vendor/autocomplete/estilo.css',
                ),
                'scripts' => array(
                    'vendor/autocomplete/jquery-migrate.js', //Vem primeiro
                    'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                    'vendor/calcx/venda.js',
                    'vendor/select2/select2.min.js',
                    'vendor/select2/app.js',
                    'vendor/sweetalert2/sweetalert2.js',
                    'vendor/autocomplete/jquery-ui.js', //Vem por último
                ),
                'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
                'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)),
                'vendedores' => $this->core_model->get_all('vendedores', array('vendedor_ativo' => 1)),
            );

//                echo '<pre>';
//                print_r($venda_produtos);
//                exit();

            $this->load->view('layout/header', $data);
            $this->load->view('vendas/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($venda_id = NULL) {

        if (!$venda_id || !$this->core_model->get_by_id('vendas', array('venda_id' => $venda_id))) {
            $this->session->set_flashdata('error', 'Venda não encontrada');
            redirect('vendas');
        } else {

            //Atualização de estoque
            //Foi decidido que não haverá atualização de venda já encerrada
//            $venda_produtos = $data['venda_produtos'] = $this->vendas_model->get_all_produtos_by_venda($venda_id);


            $this->form_validation->set_rules('venda_cliente_id', '', 'required');
            $this->form_validation->set_rules('venda_tipo', '', 'required');
            $this->form_validation->set_rules('venda_forma_pagamento_id', '', 'required');
            $this->form_validation->set_rules('venda_vendedor_id', '', 'required');


            if ($this->form_validation->run()) {

                $venda_valor_total = str_replace('R$', "", trim($this->input->post('venda_valor_total')));

                $data = elements(
                        array(
                    'venda_cliente_id',
                    'venda_forma_pagamento_id',
                    'venda_tipo',
                    'venda_vendedor_id',
                    'venda_valor_desconto',
                    'venda_valor_total',
                        ), $this->input->post()
                );

                $data['venda_valor_total'] = trim(preg_replace('/\$/', '', $venda_valor_total));

                $data = html_escape($data);

                $this->core_model->update('vendas', $data, array('venda_id' => $venda_id));

                /* Deletando de venda os produtos antigos da venda editada */
                $this->vendas_model->delete_old_products($venda_id);

                $produto_id = $this->input->post('produto_id');
                $produto_quantidade = $this->input->post('produto_quantidade');
                $produto_desconto = str_replace('%', '', $this->input->post('produto_desconto'));

                $produto_preco_venda = str_replace('R$', '', $this->input->post('produto_preco_venda'));
                $produto_item_total = str_replace('R$', '', $this->input->post('produto_item_total'));

                $produto_preco = str_replace(',', '', $produto_preco_venda);
                $produto_item_total = str_replace(',', '', $produto_item_total);


                $qty_produto = count($produto_id);




                for ($i = 0; $i < $qty_produto; $i++) {

                    $data = array(
                        'venda_produto_id_venda' => $venda_id,
                        'venda_produto_id_produto' => $produto_id[$i],
                        'venda_produto_quantidade' => $produto_quantidade[$i],
                        'venda_produto_valor_unitario' => $produto_preco_venda[$i],
                        'venda_produto_desconto' => $produto_desconto[$i],
                        'venda_produto_valor_total' => $produto_item_total[$i],
                    );

                    $data = html_escape($data);

                    $this->core_model->insert('venda_produtos', $data);

                    /* Início atualização estoque */

//                    foreach ($venda_produtos as $venda_p) {
//
//                        if ($venda_p->venda_produto_quantidade < $produto_quantidade[$i]) {
//
//                            $produto_qtde_estoque = 0;
//
//                            $produto_qtde_estoque += intval($produto_quantidade[$i]);
//
//                            $diferenca = ($produto_qtde_estoque - $venda_p->venda_produto_quantidade);
//
//                            $this->produtos_model->update($produto_id[$i], $diferenca);
//                        }
//                    }
                    /* Fim atualização estoque */
                }//Fim for
//                redirect('vendas/imprimir/' . $venda_id);
                redirect('vendas');
            } else {

                //Erro de validação

                $data = array(
                    'titulo' => 'Atualizar venda',
                    'styles' => array(
                        'vendor/select2/select2.min.css',
                        'vendor/autocomplete/jquery-ui.css',
                        'vendor/autocomplete/estilo.css',
                    ),
                    'scripts' => array(
                        'vendor/autocomplete/jquery-migrate.js', //Vem primeiro
                        'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                        'vendor/calcx/venda.js',
                        'vendor/select2/select2.min.js',
                        'vendor/select2/app.js',
                        'vendor/sweetalert2/sweetalert2.js',
                        'vendor/autocomplete/jquery-ui.js', //Vem por último
                    ),
                    'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
                    'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)),
                    'vendedores' => $this->core_model->get_all('vendedores', array('vendedor_ativo' => 1)),
                    'venda' => $this->vendas_model->get_by_id($venda_id),
                    'venda_produtos' => $this->vendas_model->get_all_produtos_by_venda($venda_id),
                    'desabilitar' => TRUE, //Desabilita botão de submit
                );

//                echo '<pre>';
//                print_r($venda_produtos);
//                exit();

                $this->load->view('layout/header', $data);
                $this->load->view('vendas/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($venda_id = NULL) {

        if (!$venda_id || !$this->core_model->get_by_id('vendas', array('venda_id' => $venda_id))) {
            $this->session->set_flashdata('error', 'Venda não encontrada');
            redirect('vendas');
        } else {

            $this->core_model->delete('vendas', array('venda_id' => $venda_id));
            redirect('vendas');
        }
    }

    public function imprimir($venda_id = NULL) {

        if (!$venda_id || !$this->core_model->get_by_id('vendas', array('venda_id' => $venda_id))) {
            $this->session->set_flashdata('error', 'Venda não encontrada');
            redirect('vendas');
        } else {

            $data = array(
                'titulo' => 'Escolha uma opção',
                'venda' => $this->core_model->get_by_id('vendas', array('venda_id' => $venda_id)),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('vendas/imprimir');
            $this->load->view('layout/footer');
        }
    }

    public function pdf($venda_id = NULL) {

        if (!$venda_id || !$this->core_model->get_by_id('vendas', array('venda_id' => $venda_id))) {
            $this->session->set_flashdata('error', 'Venda não encontrada');
            redirect('vendas');
        } else {

            $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

            $venda = $this->vendas_model->get_by_id($venda_id);

            $file_name = 'Venda&nbsp;' . $venda->venda_id;


            //Início do HTML
            $html = '<html>';


            $html .= '<head>';


            $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Impressão de venda</title>';


            $html .= '</head>';

            $html .= '<body style="font-size: 14px">';

            $html .= '<h4 align="center">
                ' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ: ' . $empresa->sistema_cnpj . '<br/>
                ' . $empresa->sistema_endereco . ', &nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'CEP: ' . $empresa->sistema_cep . ', &nbsp;' . $empresa->sistema_cidade . ', &nbsp;' . $empresa->sistema_estado . '<br/>
                    ' . 'Telefone: ' . $empresa->sistema_telefone_fixo . '<br/>
                    ' . 'E-mail: ' . $empresa->sistema_email . '<br/>
                    </h4>';

            $html .= '<hr>';

            //Dados do cliente

            $html .= '<p align="right" style="font-size: 12px">Venda Nº&nbsp;' . $venda->venda_id . '</p>';

            $html .= '<p>'
                    . '<strong>Cliente: </strong>' . $venda->cliente_nome_completo . '<br/>'
                    . '<strong>CPF: </strong>' . $venda->cliente_cpf_cnpj . '<br/>'
                    . '<strong>Celular: </strong>' . $venda->cliente_celular . '<br/>'
                    . '<strong>Data de emissão: </strong>' . formata_data_banco_com_hora($venda->venda_data_emissao) . '<br/>'
                    . '<strong>Forma de pagamento: </strong>' . $venda->forma_pagamento . '<br/>'
                    . '</p>';


            $html .= '<hr>';

            //Dados da ordem


            $html .= '<table width="100%" border: solid #ddd 1px>';

            $html .= '<tr>';

            $html .= '<th>Código produto</th>';
            $html .= '<th>Descrição</th>';
            $html .= '<th>Quantidade</th>';
            $html .= '<th>Valor unitário</th>';
            $html .= '<th>Desconto</th>';
            $html .= '<th>Valor total</th>';

            $html .= '</tr>';




//            $venda_id = $venda->venda_id;

            $produtos_venda = $this->vendas_model->get_all_produtos($venda_id);

//            echo '<pre>';
//            print_r($servicos_ordem);
//            exit();

            $valor_final_venda = $this->vendas_model->get_valor_final_venda($venda_id);

//            echo '<pre>';
//            print_r($valor_final_os);
//            exit();

            foreach ($produtos_venda as $produto):

                $html .= '<tr>';
                $html .= '<td>' . $produto->venda_produto_id_produto . '</td>';
                $html .= '<td>' . $produto->produto_descricao . '</td>';
                $html .= '<td>' . $produto->venda_produto_quantidade . '</td>';
                $html .= '<td>' . 'R$&nbsp;' . $produto->venda_produto_valor_unitario . '</td>';
                $html .= '<td>' . '%&nbsp;' . $produto->venda_produto_desconto . '</td>';
                $html .= '<td>' . 'R$&nbsp;' . $produto->venda_produto_valor_total . '</td>';
                $html .= '</tr>';

            endforeach;

            $html .= '<th colspan="4">';

            $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor final</strong></td>';
            $html .= '<td style="border-top: solid #ddd 1px">' . 'R$&nbsp;' . $valor_final_venda->venda_valor_total . '</td>';

            $html .= '</th>';



            $html .= '</table>';



            $html .= '</body>';

            $html .= '</html>';

//            echo '<pre>';
//            print_r($html);
//            exit();
//            
            // False -> Abre PDF no navegador
            // True -> Faz o download

            $this->pdf->createPDF($html, $file_name, false);
        }
    }

}
