
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('categorias'); ?>">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form class="user" method="POST" name="form_add">                    

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fab fa-buffer"></i>&nbsp;Dados da categoria</legend>

                        <div class="form-group row mb-3">

                            <div class="col-md-8 mb-3">
                                <label>Nome da categoria</label>
                                <input type="text" class="form-control form-control-user" name="categoria_nome" placeholder="Nome da categoria" value="<?php echo set_value('categoria_nome'); ?>">
                                <?php echo form_error('categoria_nome', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Categoria ativa</label>
                                <select class="custom-select" name="categoria_ativa">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
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

