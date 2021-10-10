
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores'); ?>">Fornecedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" method="POST" name="form_edit">

                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao); ?></p>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-user-tag"></i>&nbsp;Dados principais</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-6 mb-3">
                                <label>Razão social</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_razao" placeholder="Razão social" value="<?php echo $fornecedor->fornecedor_razao; ?>">
                                <?php echo form_error('fornecedor_razao', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label>Nome fantasia</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_nome_fantasia" placeholder="Nome fantasia" value="<?php echo $fornecedor->fornecedor_nome_fantasia; ?>">
                                <?php echo form_error('fornecedor_nome_fantasia', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>



                        </div>
                        
                        <div class="form-group row mb-3">

                            <div class="col-md-4 mb-3">
                                <label>CNPJ</label>
                                <input type="text" class="form-control form-control-user cnpj" name="fornecedor_cnpj" placeholder="CNPJ" value="<?php echo $fornecedor->fornecedor_cnpj; ?>">
                                <?php echo form_error('fornecedor_cnpj', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Inscrição estadual</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_ie" placeholder="Inscrição estadual" value="<?php echo $fornecedor->fornecedor_ie; ?>">
                                <?php echo form_error('fornecedor_ie', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            
                            <div class="col-md-4">
                                <label>Telefone fixo</label>
                                <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_telefone" placeholder="Telefone fixo" value="<?php echo $fornecedor->fornecedor_telefone; ?>">
                                <?php echo form_error('fornecedor_telefone', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>



                        </div>
                        
                        <div class="form-group row mb-3">

                            <div class="col-md-4 mb-3">
                                <label>Celular</label>
                                <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_celular" placeholder="Celular" value="<?php echo $fornecedor->fornecedor_celular; ?>">
                                <?php echo form_error('fornecedor_celular', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>E-mail</label>
                                <input type="email" class="form-control form-control-user" name="fornecedor_email" placeholder="E-mail" value="<?php echo $fornecedor->fornecedor_email; ?>">
                                <?php echo form_error('fornecedor_email', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            
                            <div class="col-md-4">
                                <label>Nome do atendente</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_contato" placeholder="Nome do atendente" value="<?php echo $fornecedor->fornecedor_contato; ?>">
                                <?php echo form_error('fornecedor_contato', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>



                        </div>

                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de endereço</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_endereco" value="<?php echo $fornecedor->fornecedor_endereco; ?>">
                                <?php echo form_error('fornecedor_endereco', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_numero_endereco" value="<?php echo $fornecedor->fornecedor_numero_endereco; ?>">
                                <?php echo form_error('fornecedor_numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Complemento</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_complemento" value="<?php echo $fornecedor->fornecedor_complemento; ?>">
                                <?php echo form_error('fornecedor_complemento', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>


                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_bairro" value="<?php echo $fornecedor->fornecedor_bairro; ?>">
                                <?php echo form_error('fornecedor_bairro', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>CEP</label>
                                <input type="text" class="form-control form-control-user cep" name="fornecedor_cep" value="<?php echo $fornecedor->fornecedor_cep; ?>">
                                <?php echo form_error('fornecedor_cep', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-5">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="fornecedor_cidade" value="<?php echo $fornecedor->fornecedor_cidade; ?>">
                                <?php echo form_error('fornecedor_cidade', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control form-control-user uf" name="fornecedor_estado" value="<?php echo $fornecedor->fornecedor_estado; ?>">
                                <?php echo form_error('fornecedor_estado', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>


                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>


                        <div class="form-group row">

                            <div class="col-md-4">
                                <label>Fornecedor ativo</label>
                                <select class="custom-select" name="fornecedor_ativo">
                                    <option value="0" <?php echo ($fornecedor->fornecedor_ativo == 0 ? 'selected' : ''); ?>>Não</option>
                                    <option value="1" <?php echo ($fornecedor->fornecedor_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label>Observações</label>
                                <textarea class="form-control form-control-user" name="fornecedor_obs"><?php echo $fornecedor->fornecedor_obs; ?></textarea>
                                <?php echo form_error('fornecedor_obs', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                    </fieldset>


                    <div class="form-group row">
                        <input type="hidden" name="fornecedor_id" value="<?php echo $fornecedor->fornecedor_id; ?>"/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2">Voltar</a>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

