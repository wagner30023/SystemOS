
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

                <form action="" class="user" name="form_vendas" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-calendar-alt"></i></i>&nbsp;&nbsp;Escolhas as datas</legend>

                        <div class="form-group row">

                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Data inicial</label>
                                <input type="date" class="form-control form-control-user-date" name="data_inicial" required="">
                            </div>

                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Data final</label>
                                <input type="date" class="form-control form-control-user-date" name="data_final">
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

