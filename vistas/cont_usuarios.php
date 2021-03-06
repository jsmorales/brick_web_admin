<?php 

  include("../controller/UsuariosController.php");
  $usuariosInst = new usuariosController();
 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<!-- Form usuarios -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_usuario" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_usuario">-</h4>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_usuario" class="form-horizontal" method="POST">
                <br>
                    <div class="form-group" hidden>                     
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="alias" class="col-sm-2 control-label">Alias</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alias" name="alias" placeholder="Nombre de usuario en el sistema" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pass" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña de usuario en el sistema" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombres" class="col-sm-2 control-label">Nombres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre del usuario" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos del usuario" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="numero_cc" class="col-sm-2 control-label">Número de Cédula</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="numero_cc" name="numero_cc" placeholder="Número de Cédula" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fkID_tipo" class="col-sm-2 control-label">Tipo de Usuario</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fkID_tipo" name="fkID_tipo" required = "true">
                              <option></option>
                              <?php 
                                $usuariosInst->getTipoUsuarios();
                               ?>
                            </select>
                        </div>
                    </div>


                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionUsuario" type="button" class="btn btn-primary" data-action="-">
            <span id="lbl_btn_actionUsuario"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<div class="container">

	<div class="row">

        <div class="box">

                <div class="col-lg-12">

                	<hr>
                    <h1 class="text-center">Usuarios</h1>
        		    <hr>
                    <br>

                    <div class="col-lg-12 text-center">                        
                        
                        <div class="table-responsive">
                        <!-- tabla de usuarios -->
                          <table id="tabla_usuarios" class="table table-bordered table-hover table-striped">

                                      <thead>
                                          <tr>
                                              <th>ID usuario</th>
                                              <th>Alias</th>
                                              <th>Nombres</th>
                                              <th>Apellidos</th>
                                              <th>Número de Cédula</th>                                            
                                              <th>Tipo</th>
                                              <th>Opciones</th>                                               
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <?php
                                              //print_r($_COOKIE); 
                                              $usuariosInst->getTablaUsuarios();                           
                                           ?>
                                      </tbody>
                          </table>
                          <!-- /tabla de materiales -->
                      </div>

                      <br>                        
                          <button id="btn_nuevoUsuario" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_usuario"><span class="glyphicon glyphicon-plus"></span> Nuevo usuario</button>                        
                      <hr>
                        
                    </div>

                    
                </div>
        </div>

    </div>

</div>