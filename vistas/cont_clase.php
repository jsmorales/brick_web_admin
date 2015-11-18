<?php 

  include("../controller/claseController.php");
  $claseInst = new claseController();
 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<!-- Form clase -->
<div class="modal fade bs-example-modal-lg" id="frm_modal_clase" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_clase">-</h4>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_clase" class="form-horizontal" method="POST">
                <br>
                    <div class="form-group" hidden>                     
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la clase" required = "true">
                        </div>
                    </div>                   

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionclase" type="button" class="btn btn-primary" data-action="-">
            <span id="lbl_btn_actionclase"></span>
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
                    <h1 class="text-center">Clases De Material</h1>
        		    <hr>
                    <br>

                    <div class="col-lg-12 text-center">                        
                        
                        <div class="table-responsive">
                        <!-- tabla de clase -->
                          <table id="tabla_clase" class="table table-bordered table-hover table-striped">

                                      <thead>
                                          <tr>
                                              <th>ID clase</th>
                                              <th>Nombre</th>
                                              <th>Opciones</th>                                               
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <?php
                                              //print_r($_COOKIE); 
                                              $claseInst->getTablaClase();                           
                                           ?>
                                      </tbody>
                          </table>
                          <!-- /tabla de materiales -->
                      </div>

                      <br>                        
                          <button id="btn_nuevoclase" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_clase"><span class="glyphicon glyphicon-plus"></span> Nueva clase</button>                        
                      <hr>
                        
                    </div>

                    
                </div>
        </div>

    </div>

</div>