
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('modulo'); ?>">Formas de pagamento</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" method="POST" name="form_edit">

                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($forma_pagamento->forma_pagamento_data_alteracao); ?></p>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-money-check-alt"></i>&nbsp;Dados da forma de pagamento</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-6 mb-3">
                                <label>Nome da forma de pagamento</label>
                                <input type="text" class="form-control form-control-user" name="forma_pagamento_nome" placeholder="Nome da forma de pagamento" value="<?php echo $forma_pagamento->forma_pagamento_nome; ?>">
                                <?php echo form_error('forma_pagamento_nome', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Forma de pagamento ativa</label>
                                <select class="custom-select" name="forma_pagamento_ativa">
                                    <option value="0" <?php echo ($forma_pagamento->forma_pagamento_ativa == 0 ? 'selected' : ''); ?>>Não</option>
                                    <option value="1" <?php echo ($forma_pagamento->forma_pagamento_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Aceita parcelamento</label>
                                <select class="custom-select" name="forma_pagamento_aceita_parc">
                                    <option value="0" <?php echo ($forma_pagamento->forma_pagamento_aceita_parc == 0 ? 'selected' : ''); ?>>Não</option>
                                    <option value="1" <?php echo ($forma_pagamento->forma_pagamento_aceita_parc == 1 ? 'selected' : ''); ?>>Sim</option>
                                </select>
                            </div>

                        </div>

                    </fieldset>

                    
                    <div class="form-group row">
                        <input type="hidden" name="forma_pagamento_id" value="<?php echo $forma_pagamento->forma_pagamento_id; ?>"/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a title="Voltar" href="<?php echo base_url('modulo'); ?>" class="btn btn-success btn-sm ml-2">Voltar</a>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

