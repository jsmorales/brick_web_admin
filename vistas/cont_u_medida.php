<?php 

  include("../controller/u_medidaController.php");
  $u_medidaInst = new u_medidaController();
 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<!-- Form u_medida -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_u_medida" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_u_medida">-</h4>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_u_medida" class="form-horizontal" method="POST">
                <br>
                    <div class="form-group" hidden>                     
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la unidad de medida" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="abreviatura" class="col-sm-2 control-label">Abreviatura</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abreviatura" name="abreviatura" placeholder="Abreviatura de la unidad de medida" required = "true">
                        </div>
                    </div>                   

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionu_medida" type="button" class="btn btn-primary" data-action="-">
            <span id="lbl_btn_actionu_medida"></span>
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
                    <h1 class="text-center">Unidades de Medida</h1>
        		    <hr>
                    <br>

                    <div class="col-lg-12 text-center">                        
                        
                        <div class="table-responsive">
                        <!-- tabla de u_medida -->
                          <table id="tabla_u_medida" class="table table-bordered table-hover table-striped">

                                      <thead>
                                          <tr>
                                              <th>ID u_medida</th>
                                              <th>Nombre</th>
                                              <th>Abreviatura</th>
                                              <th>Opciones</th>                                               
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <?php
                                              //print_r($_COOKIE); 
                                              $u_medidaInst->getTablaUmedida();                           
                                           ?>
                                      </tbody>
                          </table>
                          <!-- /tabla de materiales -->
                      </div>

                      <br>                        
                          <button id="btn_nuevou_medida" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_u_medida"><span class="glyphicon glyphicon-plus"></span> Nueva Unidad de medida</button>                        
                      <hr>
                        
                    </div>

                    
                </div>
        </div>

    </div>

</div>