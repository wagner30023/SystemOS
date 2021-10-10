<?php
/*
SYSTEM OS - VISAOTEC SISTEMAS
------------------------------
By: Isaias de Oliveira
E-mail: visaotec.com@gmail.com
Todos os direitos reservados
*/
defined('BASEPATH') OR exit('Ação não permitida');

class Vendas_model extends CI_Model {

    public function get_all() {

        $this->db->select([
            'vendas.*',
            'clientes.cliente_id',
            'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as cliente_nome_completo',
            'vendedores.vendedor_id',
            'vendedores.vendedor_nome_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
        ]);

        $this->db->join('clientes', 'cliente_id = venda_cliente_id', 'LEFT');
        $this->db->join('vendedores', 'vendedor_id = venda_vendedor_id', 'LEFT');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');

        return $this->db->get('vendas')->result();
    }

    public function get_by_id($venda_id = NULL) {

        $this->db->select([
            'vendas.*',
            'clientes.cliente_id',
            'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as cliente_nome_completo',
            'clientes.cliente_cpf_cnpj',
            'clientes.cliente_celular',
            'vendedores.vendedor_id',
            'vendedores.vendedor_nome_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
        ]);

        $this->db->where('venda_id', $venda_id);
        $this->db->join('clientes', 'cliente_id = venda_cliente_id', 'LEFT');
        $this->db->join('vendedores', 'vendedor_id = venda_vendedor_id', 'LEFT');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');

        return $this->db->get('vendas')->row();
    }

    public function get_all_produtos_by_venda($venda_id = NULL) {

        if ($venda_id) {

            $this->db->select([
                'venda_produtos.*',
                'produtos.produto_descricao',
            ]);

            $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');

            $this->db->where('venda_produto_id_venda', $venda_id);

            return $this->db->get('venda_produtos')->result();
        }
    }

    public function delete_old_products($venda_id = NULL) {

        if ($venda_id) {

            $this->db->delete('venda_produtos', array('venda_produto_id_venda' => $venda_id));
        }
    }

    //Utilizado na impressão de pdf
    public function get_all_produtos($venda_id = NULL) {

        if ($venda_id) {

            $this->db->select([
                'venda_produtos.*',
                'FORMAT(SUM(REPLACE(venda_produto_valor_unitario, ",", "")), 2) as venda_produto_valor_unitario',
                'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_produto_valor_total',
                'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_valor_total',
                'produtos.produto_id',
                'produtos.produto_descricao',
            ]);

            $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
            $this->db->where('venda_produto_id_venda', $venda_id);

            $this->db->group_by('venda_produto_id_produto');

            return $this->db->get('venda_produtos')->result();
        }
    }

    public function get_valor_final_venda($venda_id = NULL) {

        if ($venda_id) {

            $this->db->select([
                'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_valor_total',
            ]);

            $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
            $this->db->where('venda_produto_id_venda', $venda_id);
        }

        return $this->db->get('venda_produtos')->row();
    }

    /* Utilizados no relatório de vendas */

    public function gerar_relatorio_vendas($data_inicial = NULL, $data_final = NULL) {

        $this->db->select([
            'vendas.*',
            'clientes.cliente_id',
            'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as cliente_nome_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
        ]);

        $this->db->join('clientes', 'cliente_id = venda_cliente_id', 'LEFT');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');


        if ($data_inicial && $data_final) {

            $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(venda_data_emissao, 1, 10) <= '$data_final'");
        } else {
            $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial'");
        }

        return $this->db->get('vendas')->result();
    }

    public function get_valor_final_relatorio($data_inicial = NULL, $data_final = NULL) {

        $this->db->select([
            'FORMAT(SUM(REPLACE(venda_valor_total, ",", "")), 2) as venda_valor_total',
        ]);

        if ($data_inicial && $data_final) {

            $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(venda_data_emissao, 1, 10) <= '$data_final'");
        } else {
            $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial'");
        }

        return $this->db->get('vendas')->row();
    }

    /* Fim Utilizados no relatório de vendas */
}
