<?php
/*
SYSTEM OS - VISAOTEC SISTEMAS
------------------------------
By: Isaias de Oliveira
E-mail: visaotec.com@gmail.com
Todos os direitos reservados
*/
defined('BASEPATH') OR exit('Ação não permitida');

class Custom_error_404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data = array(
            'titulo' => 'Página não encontrada',
        );

        $this->load->view('custom_error_404', $data);
    }

}
