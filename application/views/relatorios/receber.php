
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

        <?php if ($message = $this->session->flashdata('info')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show text-gray-900" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black !important">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">

                <form action="" class="user" name="form_receber" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-calendar-alt"></i></i>&nbsp;&nbsp;Escolha uma opção</legend>

                        <div class="form-group row pt-3 pl-3">
                            <div class="custom-control custom-radio col offset-md-1 mb-2">
                                <input type="radio" id="customRadio1" name="contas" value="pagas" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">Contas pagas</label>
                            </div>
                            <div class="custom-control custom-radio ml-auto col mb-2">
                                <input type="radio" id="customRadio2" name="contas" value="receber" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Contas a receber</label>
                            </div>
                            <div class="custom-control custom-radio ml-auto col">
                                <input type="radio" id="customRadio3" name="contas" value="vencidas" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Contas vencidas</label>
                            </div>

                        </div>

                    </fieldset>


                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm mr-2">Gerar relatório</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

