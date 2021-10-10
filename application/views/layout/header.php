<!DOCTYPE html>
<html lang="en">
   <!-- 
SYSTEM OS - VISAOTEC SISTEMAS
------------------------------
By: Isaias de Oliveira
E-mail: visaotec.com@gmail.com
Todos os direitos reservados
-->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="https://cliente.topnacional.com/public/img/favicon.png" type="image/png" sizes="100x100">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php echo (isset($titulo) ? '<title>System OS | '.$titulo.'</title>' : '<title>System OS</title>') ?>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet'); ?>" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url('public/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/app.css'); ?>" rel="stylesheet">

        <?php if (isset($styles)): ?>

            <?php foreach ($styles as $style): ?>

                <link href="<?php echo base_url('public/' . $style); ?>" rel="stylesheet">

            <?php endforeach; ?>

        <?php endif; ?>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">