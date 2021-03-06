<?php 
$this->templateci->setTitlePage("Lista de Usuarios");
$this->templateci->setDescriptionPage("Lista de Usuarios");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>


    <section class="content text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-info" id="btnCreate"><i class="glyphicon glyphicon-plus"></i> Crear</button>
        <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-file"></i> PDF</button>
        <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-file"></i> EXCEL</button>
      </div>      
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Buscador</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-10">
            <?php echo form_input_ci('Usuario', 'usuarion[usuario]', '', ["id"=>"usuarion[usuario]"]); ?>            
          </div>
          <div class="col-md-2">
            <button class="btn btn-success">Buscar</button>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Usuarios</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombres y Apellidos</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>CI</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($usuarios as $usuario): ?>
                <tr>
                  <td><?php echo $usuario["nombres"].' '.$usuario["paterno"].' '.$usuario["materno"] ?></td>
                  <td><?php echo $usuario["email"] ?></td>
                  <td><?php echo $usuario["cuenta"] ?></td>
                  <td><?php echo $usuario["ci"] ?></td>
                  <td>
                    <a href="#" class="btn btn-info btnEditar" data-id="<?php echo $usuario["id_usuario"] ?>">Editar</a>
                    <a href="#" class="btn btn-info btnEliminar" data-id="<?php echo $usuario["id_usuario"] ?>">Eliminar</a>
                  </td>
                </tr>                
              <?php endforeach ?>
            </tbody>
          </table>
          <!-- /.box-header -->
          <!-- form start -->
            
            
          

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  



  <div class="modal fade" id="create">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/createUsuario', ["id"=>"formCreate"]); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Crear Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', ""); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', ''); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', ''); ?>
              
              <?php echo form_input_ci("Cuenta", 'usuario[cuenta]', ''); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', ""); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', ''); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', ''); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEdit']); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', ""); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', ''); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', ''); ?>
              
              <?php echo form_input_ci("Cuenta", 'usuario[cuenta]', ''); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', ""); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', ''); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', ''); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <?php echo form_hidden('usuario[id_usuario]', ''); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  
<?php $this->load->view('template/down'); ?>
