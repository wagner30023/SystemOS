
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">Fornecedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" method="POST" name="form_add">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;Dados pessoais</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-6 mb-3">
                                <label>Nome completo</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_nome_completo" placeholder="Nome completo" value="<?php echo set_value('vendedor_nome_completo'); ?>">
                                <?php echo form_error('vendedor_nome_completo', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>CPF</label>
                                <input type="text" class="form-control form-control-user cpf" name="vendedor_cpf" placeholder="CPF do vendedor" value="<?php echo set_value('vendedor_cpf'); ?>">
                                <?php echo form_error('vendedor_cpf', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>RG</label>
                                <input type="text" class="form-control form-control-user rg" name="vendedor_rg" placeholder="RG do vendedor" value="<?php echo set_value('vendedor_rg'); ?>">
                                <?php echo form_error('vendedor_rg', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control form-control-user" name="vendedor_email" placeholder="E-mail do vendedor" value="<?php echo set_value('vendedor_email'); ?>">
                                <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label>Telefone fixo</label>
                                <input type="text" class="form-control form-control-user sp_celphones" name="vendedor_telefone" placeholder="Telefone fixo" value="<?php echo set_value('vendedor_telefone'); ?>">
                                <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label>Celular</label>
                                <input type="text" class="form-control form-control-user sp_celphones" name="vendedor_celular" placeholder="Telefone celular" value="<?php echo set_value('vendedor_celular'); ?>">
                                <?php echo form_error('vendedor_celular', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>



                        </div>



                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de endereço</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_endereco" value="<?php echo set_value('vendedor_endereco'); ?>">
                                <?php echo form_error('vendedor_endereco', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_numero_endereco" value="<?php echo set_value('vendedor_numero_endereco'); ?>">
                                <?php echo form_error('vendedor_numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Complemento</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_complemento" value="<?php echo set_value('vendedor_complemento'); ?>">
                                <?php echo form_error('vendedor_complemento', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>


                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_bairro" value="<?php echo set_value('vendedor_bairro'); ?>">
                                <?php echo form_error('vendedor_bairro', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>CEP</label>
                                <input type="text" class="form-control form-control-user cep" name="vendedor_cep" value="<?php echo set_value('vendedor_cep'); ?>">
                                <?php echo form_error('vendedor_cep', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-5">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_cidade" value="<?php echo set_value('vendedor_cidade'); ?>">
                                <?php echo form_error('vendedor_cidade', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control form-control-user uf" name="vendedor_estado" value="<?php echo set_value('vendedor_estado'); ?>">
                                <?php echo form_error('vendedor_estado', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>


                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>


                        <div class="form-group row">

                            <div class="col-md-3">
                                <label>Vendedor ativo</label>
                                <select class="custom-select" name="vendedor_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Matrícula</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_codigo" value="<?php echo $vendedor_codigo ?>" readonly="">
                            </div>

                            <div class="col-md-6">
                                <label>Observações</label>
                                <textarea class="form-control form-control-user" name="vendedor_obs"><?php echo set_value('vendedor_obs'); ?></textarea>
                                <?php echo form_error('vendedor_obs', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                    </fieldset>

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2">Voltar</a>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

