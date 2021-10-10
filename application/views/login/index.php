

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 10rem !important">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">   
                        <div class="col-lg-12">
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

                            <?php if ($message = $this->session->flashdata('info')): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning alert-dismissible fade show text-gray-900" role="alert">
                                            <strong><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black !important">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-laptop"></i>&nbsp;System OS</h1>
                                </div>
                                <form class="user" name="form_auth" method="POST" action="<?php echo base_url('login/auth'); ?>">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Entre com seu e-mail...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Entre com sua senha">
                                    </div>

                                    
                                    <button type="submit" class="btn btn-primary btn-block"><i class="far fa-user-circle"></i>&nbsp; &nbsp;Entrar</button>
                                </form>
                                &nbsp; &nbsp; &nbsp; &nbsp;
                                <div class="copyright text-center my-auto">
                                <span>Copyright &copy; System OS <?php echo date('Y') ?>&nbsp; | By Visaotec Sistemas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>