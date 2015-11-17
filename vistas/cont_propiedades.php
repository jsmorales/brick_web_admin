<?php 

  include("../controller/propiedadesController.php");
  $propiedadesInst = new propiedadesController();
 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<!-- Form propiedades -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_propiedad" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_propiedad">-</h4>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_propiedad" class="form-horizontal" method="POST">
                <br>
                    <div class="form-group" hidden>                     
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la propiedad" required = "true">
                        </div>
                    </div>                   

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionPropiedad" type="button" class="btn btn-primary" data-action="-">
            <span id="lbl_btn_actionPropiedad"></span>
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
                    <h1 class="text-center">Propiedades</h1>
        		    <hr>
                    <br>

                    <div class="col-lg-12 text-center">                        
                        
                        <div class="table-responsive">
                        <!-- tabla de propiedades -->
                          <table id="tabla_propiedades" class="table table-bordered table-hover table-striped">

                                      <thead>
                                          <tr>
                                              <th>ID Propiedad</th>
                                              <th>Nombre</th>
                                              <th>Opciones</th>                                               
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <?php
                                              //print_r($_COOKIE); 
                                              $propiedadesInst->getTablaPropiedades();                           
                                           ?>
                                      </tbody>
                          </table>
                          <!-- /tabla de materiales -->
                      </div>

                      <br>                        
                          <button id="btn_nuevoPropiedad" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_propiedad"><span class="glyphicon glyphicon-plus"></span> Nueva Propiedad</button>                        
                      <hr>
                        
                    </div>

                    
                </div>
        </div>

    </div>

</div>