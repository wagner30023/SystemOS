<?php
defined('BASEPATH') or exit('Ação não permitida');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Lucio Antonio de Souza">


        <?php echo (isset($titulo) ? '<title>System ordem | ' . $titulo . '</title>' : '<title>System Ordem</title>') ?>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('public/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url('public/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center" style="margin-top: 15%">
                    <div class="error mx-auto text-danger font-weight-bold" data-text="404">404</div>
                    <p class="lead text-gray-900 mb-5">Página não encontrada</p>
                    <p class="text-gray-500 mb-5">Parece que você encontrou uma falha na matrix...</p>
                    <a class="btn btn-outline-success" href="<?php echo base_url('/'); ?>">Voltar para Home</a>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Content Wrapper -->

    </body>
    <!-- End of Page Wrapper -->

