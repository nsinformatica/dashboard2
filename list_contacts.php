<?php include 'header.php'; ?>
<script>
    $(function() { 
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id') // Extract info from data-* attributes
  var recipient2 = button.data('name')
  var recipient3 = button.data('mail')
  var recipient4 = button.data('telefone')
  var recipient5 = button.data('business')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('ID do Contato ' + recipient)
  modal.find('#recipient-id').val(recipient)
  modal.find('#recipient-name').val(recipient2)
  modal.find('#recipient-mail').val(recipient3)
  modal.find('#recipient-telefone').val(recipient4)
  modal.find('#recipient-business').val(recipient5)
});
    });
</script>
<script>
    $(function() { 
        $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('id-delete') 
  var recipient2 = button.data('name-delete')
  var modal = $(this)
  modal.find('.modal-title').text('Delete ID? ' + recipient)
  modal.find('#recipient-id-delete').val(recipient)
  modal.find('#recipient-name-delete').val(recipient2)
  
});
    });
    

</script>
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
                                <h1 class="main-title float-left">Listar Contatos</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Listar Contato</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    
                    <!-- download -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery-min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 col-xl-12">
                            <?php
                                if(isset($_GET['msg'])) {
                                    if($_GET['msg'] == 1) {?>
                                    <div class="alert alert-success" role="alert">
                                        Alterações Efetuadas!
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Registro excluído com sucesso!
                                    </div>
                                    
                                <?php } 
                                    
                                }
                            ?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-check-square"></i> Listar Contatos</h3>
                                </div>

                                <div class="card-body">
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-table"></i> Contatos</h3>
                                    
                                </div>

                                <div class="card-body">

                                    <div class="table table-responsive-xl">
                                        <table id="example" class="table table-bordered table-hover display" style="width:100%">
                                        
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Telefone</th>
                                                <th scope="col">Empresa</th>
                                                <th scope="col">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                                include 'conexao.php';
                                                $sql = "SELECT * FROM agenda_dashboard";
                                                $search = mysqli_query($conexao, $sql);
                                                while($array = mysqli_fetch_array($search)){
                                                    $id = $array['id'];
                                                    $name = $array['name'];
                                                    $mail = $array['mail'];
                                                    $telefone = $array['telefone'];
                                                    $business = $array['business'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $name ?></td>
                                                        <td><?php echo $mail ?></td>
                                                        <td><?php echo $telefone ?></td>
                                                        <td><?php echo $business ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $id ?>" data-name="<?php echo $name ?>" data-mail="<?php echo $mail ?>" data-telefone="<?php echo $telefone ?>" data-business="<?php echo $business ?>"><i class="fas fa-user-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" title="Excluir" data-toggle="modal" data-target="#deleteModal" data-id-delete="<?php echo $id ?>" data-name-delete="<?php echo $name ?>"><i class="fas fa-user-minus"></i></button>
                                                        </td>
                                                    </tr>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "edit_contact.php" method="post">
          <div class="form-group">
            
            <label for="message-text" class="col-form-label">Id Contato:</label>
            <input type="text" class="form-control" id="recipient-id" readonly name="id">
            </div>
         <div class="form-group">
            <label for="message-text" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
         </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="recipient-mail" name="mail">
         </div>
         <div class="form-group">
            <label for="message-text" class="col-form-label">Telefone:</label>
            <input type="text" class="form-control telefone" id="recipient-telefone" name="telefone">
         </div>
         <div class="form-group">
            <label for="message-text" class="col-form-label">Empresa:</label>
            <input type="text" class="form-control" id="recipient-business" name="business">
         </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--SEGUNDO MODAL - (Delete) -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "delete_contact.php" method="post">
          <div class="form-group">
            
            <label for="message-text" class="col-form-label">Id Contato:</label>
            <input type="text" class="form-control" id="recipient-id-delete" readonly name="id">
            </div>
         <div class="form-group">
            <label for="message-text" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="recipient-name-delete" readonly name="name">
         </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Excluir</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                                <?php } 
                                           ?>
                                        </tbody>
                                    </div>
                                    </table>

                                </div>
                            </div>
                            <!-- end card-->
                        </div>  

                                </div>
                            <!-- end card-->
                        </div>
                    
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
        <script type="text/javascript">
                        $(".telefone, #celular").mask("(00)00000-0000");
                    </script>
        <?php include 'footer.php'; ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#example').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
                    
                });
            });
        </script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"></script>
