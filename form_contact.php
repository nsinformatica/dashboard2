<?php include 'header.php'; ?>
<body class="adminbody">
    <div id="main">
        <!-- top bar navigation -->
       <?php include 'topbar.php'; ?>
        <!-- End Navigation -->

        <!-- Left Sidebar -->
        
        <?php include 'menu.php'; ?>
        
        <!-- End Sidebar -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Cadastrar Contato</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Cadastrar Contato</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-check-square"></i> Formulário de Contato</h3>
                                </div>

                                <div class="card-body">
                                    <?php
                                        if(isset($_GET['msg'])){?>
                                            <div class="alert alert-success" role="alert">
                                                Registro inserido com sucesso!
                                                
                                            </div>
                                        <?php } ?>
                                    <form action="_insert_contacts.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" class="form-control"  placeholder="Digite seu nome" name="name" required autocomplete="off">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="mail">E-mail</label>
                                            <input type="email" class="form-control" id="mail" aria-describedby="numberlHelp" placeholder="Seu email" name="mail" required autocomplete="off">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="telefone">Telefone:</label>
                                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="business">Empresa</label>
                                            <input type="text" class="form-control" id="business" name="business" placeholder="Nome Empresa" required autocomplete="off">
                                        </div>
                                        <div style="text-align: right">
                                        <button type="submit" class="btn btn-block btn-dark">Enviar</button>
                                        </div>
                                    </form>

                                </div>
                            <!-- end card-->
                        </div>
                    <script type="text/javascript">
                        $("#telefone, #celular").mask("(00)0000-0000");
                    </script>
                    </div>
                    </div>
                    <!-- end row -->

                    <!-- end row -->

                    <!-- end row-->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
        <?php include 'footer.php'; ?>
