
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

                <form class="user" action="" id="form" name="form_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset id="vendas" class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Escolha os produtos</legend>

                        <div class="form-group row">
                            <div class="ui-widget col-lg-12 mb-1 mt-1">
                                <input id="buscar_produtos" class="search form-control form-control-lg col-lg-12" placeholder="Que produto você está buscando?">
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table id="table_produtos" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="" style="width: 55%">Produto</th>
                                        <th class="text-right pr-2" style="width: 12%">Valor unitário</th>
                                        <th class="text-center" style="width: 8%">Qty</th>
                                        <th class="" style="width: 8%">% Desc</th>
                                        <th class="text-right pr-2" style="width: 15%">Total</th>
                                        <th class="" style="width: 25%"></th>
                                        <th class="" style="width: 25%"></th>
                                    </tr>
                                </thead>
                                <tbody id="lista_produtos" class="">

                                </tbody>
                                <tfoot >
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="venda_valor_desconto" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="venda_valor_total" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </fieldset>   

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;Dados da venda</legend>

                        <div class="">
                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
                                    <select class="custom-select contas_receber" id="venda_cliente_id" name="venda_cliente_id" required="">
                                        <option value="">Escolha</option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?php echo $cliente->cliente_id; ?>"><?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' | CPF ou CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_cliente_id', '<div class="text-danger small">', '</div>') ?>
                                </div>


                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Tipo da venda<span class="text-danger">*</span></label>
                                    <select class="custom-select" id="venda_tipo" name="venda_tipo" required="">
                                        <option value="">Escolha...</option>
                                        <option value="1">Venda à vista</option>
                                        <option value="2">Venda à prazo</option>
                                    </select>
                                    <?php echo form_error('venda_tipo', '<div class="text-danger small">', '</div>') ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label>
                                    <select id="id_pagamento" class="custom-select forma-pagamento" id="venda_forma_pagamento_id" name="venda_forma_pagamento_id" required="">
                                        <option value="">Escolha</option>
                                        <?php foreach ($formas_pagamentos as $forma_pagamento): ?>
                                            <option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>"><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="small my-0">Escolha o vendedor <span class="text-danger">*</span></label>
                                    <select id="id_vendedor" class="custom-select vendedor" id="venda_vendedor_id" name="venda_vendedor_id" required="">
                                        <option value="">Escolha</option>
                                        <?php foreach ($vendedores as $vendedor): ?>
                                            <option value="<?php echo $vendedor->vendedor_id; ?>"><?php echo $vendedor->vendedor_nome_completo . ' | ' . $vendedor->vendedor_codigo; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_vendedor_id', '<div class="text-danger small">', '</div>') ?>
                                </div>


                            </div>

                        </div>

                    </fieldset>


                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form">Cadastrar</button>
                        <a href="<?php echo base_url('vendas'); ?>" class="btn btn-secondary btn-sm">Voltar</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

