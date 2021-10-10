<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- 
SYSTEM OS - VISAOTEC SISTEMAS
------------------------------
By: Isaias de Oliveira
E-mail: visaotec.com@gmail.com
Todos os direitos reservados
-->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">System OS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Módulos
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOs" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-shopping-cart"></i>
            <span>Vendas</span>
        </a>
        <div id="collapseOs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Escolha uma opção:</h6>
                <a title="Gerenciar vendas" class="collapse-item" href="<?php echo base_url('vendas'); ?>"><i class="fas fa-shopping-cart text-gray-900"></i>&nbsp;&nbsp;Vendas</a>
                <a title="Gerenciar ordens de serviços" class="collapse-item" href="<?php echo base_url('os'); ?>"><i class="fas fa-shopping-basket text-gray-900"></i>&nbsp;&nbsp;Ordem serviços</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Escolha uma opção:</h6>
                <a title="Gerenciar clientes" class="collapse-item" href="<?php echo base_url('clientes'); ?>"><i class="fas fa-user-tie text-gray-900"></i>&nbsp;&nbsp;Clientes</a>
                <a title="Gerenciar forncedores" class="collapse-item" href="<?php echo base_url('fornecedores'); ?>"><i class="fas fa-user-tag text-gray-900"></i>&nbsp;&nbsp;Fornecedores</a>
                <a title="Gerenciar vendedores" class="collapse-item" href="<?php echo base_url('vendedores'); ?>"><i class="fas fa-user-secret text-gray-900"></i>&nbsp;&nbsp;Vendedores</a>
                <a title="Gerenciar serviços" class="collapse-item" href="<?php echo base_url('servicos'); ?>"><i class="fas fa-laptop text-gray-900"></i>&nbsp;&nbsp;Serviços</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTres" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-box-open"></i>
            <span>Estoque</span>
        </a>
        <div id="collapseTres" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Escolha uma opção:</h6>
                <a title="Gerenciar marcas" class="collapse-item" href="<?php echo base_url('marcas'); ?>"><i class="fas fa-cubes text-gray-900"></i>&nbsp;&nbsp;Marcas</a>
                <a title="Gerenciar produtos" class="collapse-item" href="<?php echo base_url('produtos'); ?>"><i class="fab fa-product-hunt text-gray-900"></i>&nbsp;&nbsp;Produtos</a>
                <a title="Gerenciar categorias" class="collapse-item" href="<?php echo base_url('categorias'); ?>"><i class="fab fa-buffer text-gray-900"></i>&nbsp;&nbsp;Categorias</a>
            </div>
        </div>
    </li>

    <?php if ($this->ion_auth->is_admin()): ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuatro" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-wallet"></i>
                <span>Financeiro</span>
            </a>
            <div id="collapseQuatro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Escolha uma opção:</h6>
                    <a title="Gerenciar contas a pagar" class="collapse-item" href="<?php echo base_url('pagar'); ?>"><i class="fas fa-money-bill-alt text-gray-900"></i>&nbsp;&nbsp;Contas a pagar</a>
                    <a title="Gerenciar contas a receber" class="collapse-item" href="<?php echo base_url('receber'); ?>"><i class="fas fa-hand-holding-usd text-gray-900"></i>&nbsp;&nbsp;Contas a receber</a>
                    <a title="Gerenciar formas de pagamento" class="collapse-item" href="<?php echo base_url('modulo'); ?>"><i class="fas fa-money-check-alt text-gray-900"></i>&nbsp;&nbsp;Formas de pagamento</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCinco" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-search-dollar"></i>
                <span>Relatórios</span>
            </a>
            <div id="collapseCinco" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Escolha uma opção:</h6>
                    <a title="Gerar relatório de vendas" class="collapse-item" href="<?php echo base_url('relatorios/vendas'); ?>"><i class="fas fa-shopping-cart text-gray-900"></i>&nbsp;&nbsp;Vendas</a>
                    <a title="Gerar relatório de ordens de serviços" class="collapse-item" href="<?php echo base_url('relatorios/os'); ?>"><i class="fas fa-shopping-basket text-gray-900"></i>&nbsp;&nbsp;Ordens de serviços</a>
                    <a title="Gerar relatório de contas a pagar" class="collapse-item" href="<?php echo base_url('relatorios/pagar'); ?>"><i class="fas fa-money-bill-alt text-gray-900"></i>&nbsp;&nbsp;Contas a pagar</a>
                    <a title="Gerar relatório de contas a receber" class="collapse-item" href="<?php echo base_url('relatorios/receber'); ?>"><i class="fas fa-hand-holding-usd text-gray-900"></i>&nbsp;&nbsp;Contas a receber</a>


                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Heading -->
        <div class="sidebar-heading">
            Configurações
        </div>


        <!-- Nav Item -->
        <li class="nav-item">
            <a title="Gerenciar usuários" class="nav-link" href="<?php echo base_url('usuarios'); ?>">
                <i class="fas fa-users"></i>
                <span>Usuários</span></a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item">
            <a title="Gerenciar dados do sistema" class="nav-link" href="<?php echo base_url('sistema'); ?>">
                <i class="fas fa-cogs"></i>
                <span>Sistema</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">