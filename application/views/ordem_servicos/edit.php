
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('os'); ?>">Ordens de serviços</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" action="" id="form" name="form_edit" enctype="multipart/form-data" method="post" accept-charset="utf-8">


                    <fieldset id="vendas" class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;&nbsp;Escolha os serviços</legend>

                        <div class="form-group row">
                            <div class="ui-widget col-lg-12 mb-1 mt-1">
                                <input id="buscar_servicos" class="search form-control form-control-lg col-lg-12" placeholder="Que serviço você está buscando?">
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table id="table_servicos" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="" style="width: 55%">Serviço</th>
                                        <th class="text-right pr-2" style="width: 12%">Valor unitário</th>
                                        <th class="text-center" style="width: 8%">Qty</th>
                                        <th class="" style="width: 8%">% Desc</th>
                                        <th class="text-right pr-2" style="width: 15%">Total</th>
                                        <th class="" style="width: 25%"></th>
                                        <th class="" style="width: 25%"></th>
                                    </tr>
                                </thead>
                                <tbody id="lista_servicos" class="">

                                    <?php if (isset($os_tem_servicos)): ?>

                                        <?php $i = 0; ?>

                                        <?php foreach ($os_tem_servicos as $os_servico): ?>

                                            <?php $i++; ?>

                                            <tr>
                                                <td><input type="hidden" name="servico_id[]" value="<?php echo $os_servico->ordem_ts_id_servico ?>" data-cell="A<?php echo $i; ?>" data-format="0" readonly></td>
                                                <td><input title="Descrição do servico" type="text" name="servico_descricao[]" value="<?php echo $os_servico->servico_descricao ?>" class="servico_descricao form-control form-control-user input-sm" data-cell="B<?php echo $i; ?>" readonly></td>
                                                <td><input title="Valor unitário do servico" name="servico_preco[]" value="<?php echo $os_servico->ordem_ts_valor_unitario ?>" class="form-control form-control-user input-sm text-right money pr-1" data-cell="C<?php echo $i; ?>" data-format="R$ 0,0.00" readonly></td>
                                                <td><input title="Digite a quantidade apenas em número inteiros" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="servico_quantidade[]" value="<?php echo $os_servico->ordem_ts_quantidade ?>" class="qty form-control form-control-user text-center" data-cell="D<?php echo $i; ?>" data-format="0[.]00" required></td>
                                                <td><input title="Insira o desconto" name="servico_desconto[]" class="form-control form-control-user input-sm text-right" value="<?php echo $os_servico->ordem_ts_valor_desconto ?>" data-cell="E<?php echo $i; ?>" data-format="0,0[.]00 %" required></td>
                                                <td><input title="Valor total do servico selecionado" name="servico_item_total[]" value="<?php echo $os_servico->ordem_ts_valor_total ?>" class="form-control form-control-user input-sm text-right pr-1" data-cell="F<?php echo $i; ?>" data-format="R$ 0,0.00" data-formula="D<?php echo $i; ?>*(C<?php echo $i; ?>-(C<?php echo $i; ?>*E<?php echo $i; ?>))" readonly></td>
                                                <td class="text-center"><input type="hidden" name="valor_desconto_servico[]" data-cell="H<?php echo $i; ?>"  data-format="R$ 0,0.00" data-formula="((C<?php echo $i; ?>*D<?php echo $i; ?>)-F<?php echo $i; ?>)"><button title="Remover o servico" class="btn-remove btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                            </tr>


                                        <?php endforeach; ?>

                                    <?php endif; ?>

                                </tbody>
                                <tfoot >
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="ordem_servico_valor_desconto" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="ordem_servico_valor_total" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </fieldset>   

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="far fa-list-alt"></i>&nbsp;&nbsp;Dados da ordem</legend>

                        <div class="">
                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
                                    <select class="custom-select contas_receber" name="ordem_servico_cliente_id" required="">
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?php echo $cliente->cliente_id; ?>" <?php echo ($cliente->cliente_id == $ordem_servico->ordem_servico_cliente_id ? 'selected' : '') ?> ><?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' | CPF ou CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('ordem_servico_cliente_id', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label>
                                    <select id="id_pagamento" class="custom-select forma-pagamento" name="ordem_servico_forma_pagamento_id">
                                        <option value="">Escolha</option>
                                        <?php foreach ($formas_pagamentos as $forma_pagamento): ?>
                                            <option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>" <?php echo ($forma_pagamento->forma_pagamento_id == $ordem_servico->ordem_servico_forma_pagamento_id ? 'selected' : '') ?> ><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('ordem_servico_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-md-3">
                                    <label class="small my-0">Status da ordem <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="ordem_servico_status">
                                        <option value="0" <?php echo $ordem_servico->ordem_servico_status == 0 ? 'selected' : '' ?>>Aberta</option>
                                        <option value="1" <?php echo $ordem_servico->ordem_servico_status == 1 ? 'selected' : '' ?>>Fechada</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Equipamento <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_equipamento', $ordem_servico->ordem_servico_equipamento); ?>" name="ordem_servico_equipamento" required="">
                                    <?php echo form_error('ordem_servico_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-sm-3 mb-1 mb-sm-0">
                                    <label class="small my-0">Marca <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_marca_equipamento', $ordem_servico->ordem_servico_marca_equipamento); ?>" name="ordem_servico_marca_equipamento" required="">
                                    <?php echo form_error('ordem_servico_marca_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-sm-3 mb-1 mb-sm-0">
                                    <label class="small my-0">Modelo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_modelo_equipamento', $ordem_servico->ordem_servico_modelo_equipamento); ?>" name="ordem_servico_modelo_equipamento" required="">
                                    <?php echo form_error('ordem_servico_modelo_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Defeitos <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_defeito', $ordem_servico->ordem_servico_defeito); ?>" name="ordem_servico_defeito" required="">
                                    <?php echo form_error('ordem_servico_defeito', '<div class="text-danger small">', '</div>') ?>
                                </div>     

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Acessórios <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_acessorios', $ordem_servico->ordem_servico_acessorios); ?>" name="ordem_servico_acessorios" required="">
                                    <?php echo form_error('ordem_servico_acessorios', '<div class="text-danger small">', '</div>') ?>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12 mb-1 mb-sm-0">
                                    <label class="small my-0">Observações <span class="text-danger"></span></label>
                                    <textarea type="text" class="form-control form-control-user" value="" name="ordem_servico_obs"><?php echo set_value('ordem_servico_obs', $ordem_servico->ordem_servico_obs); ?></textarea>
                                </div>     

                            </div>

                        </div>

                    </fieldset>

                    <input type="hidden" name="ordem_servico_id" value="<?php echo $ordem_servico->ordem_servico_id ?>" />

                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form" <?php echo ($ordem_servico->ordem_servico_status == 1 ? 'disabled' : ''); ?>><?php echo ($ordem_servico->ordem_servico_status == 1 ? 'Paga' : 'Salvar'); ?></button>
                        <a href="<?php echo base_url('os'); ?>" class="btn btn-secondary btn-sm">Voltar</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

