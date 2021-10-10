
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">Marcas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" method="POST" name="form_edit">

                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($marca->marca_data_alteracao); ?></p>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-cubes"></i>&nbsp;Dados da marca</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-8 mb-3">
                                <label>Nome da marca</label>
                                <input type="text" class="form-control form-control-user" name="marca_nome" placeholder="Nome da marca" value="<?php echo $marca->marca_nome; ?>">
                                <?php echo form_error('marca_nome', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Marca ativa</label>
                                <select class="custom-select" name="marca_ativa">
                                    <option value="0" <?php echo ($marca->marca_ativa == 0 ? 'selected' : ''); ?>>Não</option>
                                    <option value="1" <?php echo ($marca->marca_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                                </select>
                            </div>

                        </div>

                    </fieldset>

                    


                    <div class="form-group row">
                        <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id; ?>"/>
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

