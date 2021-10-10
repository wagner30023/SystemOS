
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios'); ?>">Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url('usuarios'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            </div>
            <div class="card-body">

                <form class="user" method="POST" name="form_edit">
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Nome</label>
                            <input type="text" class="form-control form-control-user" name="first_name" placeholder="Seu nome" value="<?php echo $usuario->first_name; ?>">
                            <?php echo form_error('first_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Sobrenome</label>
                            <input type="text" class="form-control form-control-user" name="last_name" placeholder="Seu sobrenome" value="<?php echo $usuario->last_name; ?>">
                            <?php echo form_error('last_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>E-mail&nbsp;(Login)</label>
                            <input type="email" class="form-control form-control-user" name="email" placeholder="Seu email (login)" value="<?php echo $usuario->email; ?>">
                            <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Usuário</label>
                            <input type="text" class="form-control form-control-user" name="username" placeholder="Seu usuário" value="<?php echo $usuario->username; ?>">
                            <?php echo form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Ativo</label>

                            <select class="custom-select" name="active" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : '') ?>>

                                <option value="0" <?php echo ($usuario->active == 0) ? 'selected' : '' ?>>Não</option>
                                <option value="1" <?php echo ($usuario->active == 1) ? 'selected' : '' ?>>Sim</option>

                            </select>


                        </div>

                        <div class="col-md-4">
                            <label>Perfil de acesso</label>

                            <select class="custom-select" name="perfil_usuario" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : '') ?>>

                                <option value="2" <?php echo ($perfil_usuario->id == 2) ? 'selected' : '' ?>>Vendedor</option>
                                <option value="1" <?php echo ($perfil_usuario->id == 1) ? 'selected' : '' ?>>Administrador</option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-6">
                            <label>Senha</label>
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Sua senha">
                            <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label>Confirme</label>
                            <input type="password" class="form-control form-control-user" name="confirm_password" placeholder="Confirme sua senha">
                            <?php echo form_error('confirm_password', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <input type="hidden" name="usuario_id" value="<?php echo $usuario->id ?>">

                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

