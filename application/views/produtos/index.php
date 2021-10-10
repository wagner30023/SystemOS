
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <?php if ($message = $this->session->flashdata('sucesso')): ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>

            </div>

        <?php endif; ?>

        <?php if ($message = $this->session->flashdata('error')): ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>

            </div>

        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Cadastrar novo produto" href="<?php echo base_url('produtos/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>&nbsp;Novo</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered produtos" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código do produto</th>
                                <th>Nome do produto</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th class="text-center">Estoque mínimo</th>
                                <th class="text-center">Qtde estoque</th>
                                <th class="text-center">Ativo</th>
                                <th class="text-right no-sort pr-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td><?php echo $produto->produto_id ?></td>
                                    <td><?php echo $produto->produto_codigo ?></td>
                                    <td><?php echo $produto->produto_descricao ?></td>
                                    <td><?php echo $produto->produto_marca ?></td>
                                    <td><?php echo $produto->produto_categoria ?></td>
                                    <td class="text-center pr-2"><?php echo '<span class="badge badge-success btn-sm">' . $produto->produto_estoque_minimo . '</span>' ?></td>
                                    <td class="text-center pr-2"><?php echo ($produto->produto_estoque_minimo == $produto->produto_qtde_estoque ? '<span class="badge badge-warning btn-sm text-gray-900">' . $produto->produto_qtde_estoque . '</span>' : '<span class="badge badge-info btn-sm">' . $produto->produto_qtde_estoque . '</span>') ?></td>
                                    <td class="text-center pr-4"><?php echo ($produto->produto_ativo == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-warning btn-sm">Não</span>') ?></td>
                                    <td class="text-right">
                                        <a title="Editar" href="<?php echo base_url('produtos/edit/' . $produto->produto_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#produto-<?php echo $produto->produto_id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            <div class="modal fade" id="produto-<?php echo $produto->produto_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza da deleção?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Para excluir o registro clique em <strong>"Sim"</strong></div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('produtos/del/' . $produto->produto_id); ?>">Sim</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

