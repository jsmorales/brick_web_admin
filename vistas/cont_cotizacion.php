<?php 

    include("../controller/materialesController.php");
    include("../controller/cotizacionController.php");

    $materialesinst = new MaterialesController();

    $cotizacioninst = new CotizacionController();

 ?>

<!-- form modal 2-->
<!-- Modal -->
<div class="modal fade" id="frm_modal_cotizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cotización de Materiales</h4>
      </div>
      <div class="modal-body">
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-modal" role="tablist">
          <li role="presentation" class="active"><a href="#calcMateriales" aria-controls="calcMateriales" role="tab" data-toggle="tab">Cálculo de materiales</a></li>
          <li role="presentation"><a href="#cotizacionGeneral" aria-controls="cotizacionGeneral" role="tab" data-toggle="tab">Cotización General</a></li>                    
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

          <div role="tabpanel" class="tab-pane active" id="calcMateriales">
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
              <form id="form_calc_cotiza" class="form-horizontal" method="POST">
            
            <h4 class="text-center">Medidas Pared</h4>
            <hr>

            <br>              
                <div class="input-group">
                  <label for="altoP" class="input-group-addon">Alto</label>
                  <input type="number" class="form-control" id="altoP" name="altoP" placeholder="Alto de la pared en metros" min="1" max="9999" required = "true">
                  <div class="input-group-addon">Metros</div>
                </div>
                <br>
                <div class="input-group">
                  <label for="anchoP" class="input-group-addon">Ancho</label>
                  <input type="number" class="form-control" id="anchoP" name="anchoP" placeholder="Ancho de la pared en metros" min="1" max="9999" required = "true">
                  <div class="input-group-addon">Metros</div>
                </div>
            <br>
            <h4 class="text-center">Ladrillo</h4>
            <hr>

                    <div class="form-group">
                        <label for="selectLadrillo" class="col-sm-2 control-label">Ladrillo</label>
                        <div class="col-sm-10">                                                            
                        <?php                        
                        echo '<select name="selectLadrillo" id="selectLadrillo" class="form-control" required = "true">
                                <option></option>'; 
                                    $ladrilloSelect = $materialesinst->getLadrillos();
                                    for ($i=0; $i < sizeof($ladrilloSelect); $i++) {
                                        echo '<option value="'.$ladrilloSelect[$i]["pkID"].'" data-precio="'.$ladrilloSelect[$i]["precio"].'">'.$ladrilloSelect[$i]["nombre"].'</option>';
                                    };
                        echo '</select>';
                        ?>                            
                        </div>                        
                    </div>
                    <div id="loadPropiedades"></div>
            <br>
            <h4 class="text-center">Cemento</h4>
            <hr>

                    <div class="form-group">
                        <label for="selectCemento" class="col-sm-2 control-label">Cemento</label>
                        <div class="col-sm-10">                                                            
                        <?php                        
                        echo '<select name="selectCemento" id="selectCemento" class="form-control" required = "true">
                                <option></option>'; 
                                    $cementoSelect = $materialesinst->getCemento();
                                    for ($i=0; $i < sizeof($cementoSelect); $i++) {
                                        echo '<option value="'.$cementoSelect[$i]["pkID"].'" data-precio="'.$cementoSelect[$i]["precio"].'">'.$cementoSelect[$i]["nombre"].'</option>';
                                    };
                        echo '</select>';
                        ?>                            
                        </div>                        
                    </div>                    
                    <div id="loadPropiedadesCem"></div>
            <br>
            <h4 class="text-center">Mezcla</h4>
            <hr>

            <div class="input-group">
              <label for="grosorMezcla" class="input-group-addon">Grosor de la mezcla</label>
              <input type="number" class="form-control" id="grosorMezcla" name="grosorMezcla" value="1.5">
              <div class="input-group-addon">cm</div>
            </div>

        </form>
            
            <div id="resultadosCalculo" hidden="">

              <br>
              <h4 class="text-center">Total ladrillos</h4>
              <hr>
              
              <div class="input-group">
                <label for="" class="input-group-addon">Cantidad</label>
                <input type="number" class="form-control" id="total_lad" name="total_lad" readonly="">
                <div class="input-group-addon">Unidad(es)</div>
              </div>
              <br>
              <div class="input-group">
                <label for="precio_lad_total" class="input-group-addon">$</label>
                <input type="number" class="form-control" id="precio_lad_total" name="precio_lad_total" readonly="">
                <div class="input-group-addon">Costo</div>
              </div>

              <br>
              <h4 class="text-center">Total Cemento</h4>
              <hr>
              <div class="input-group">
                <label for="parcial_cem" class="input-group-addon">Estimado Parcial</label>
                <input type="number" class="form-control" id="parcial_cem" name="parcial_cem" readonly="">
                <div class="input-group-addon">Kg</div>
              </div>
              <br>
              <div class="input-group">
                <label for="total_cem" class="input-group-addon">Cantidad</label>
                <input type="number" class="form-control" id="total_cem" name="total_cem" readonly="">
                <div class="input-group-addon">Unidad(es)</div>
              </div>
              <br>
              <div class="input-group">
                <label for="precio_cem_total" class="input-group-addon">$</label>
                <input type="number" class="form-control" id="precio_cem_total" name="precio_cem_total" readonly="">
                <div class="input-group-addon">Costo</div>
              </div>

              

            </div>

            <br>
            <button id="btnCalcula" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Calcular</button>
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
          </div>

          <div role="tabpanel" class="tab-pane" id="cotizacionGeneral">
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
              <form id="frm_cotiza_gen">
                <br>
                <div hidden="">
                  <div class="input-group">                
                    <input type="text" class="form-control" id="fkID_usuario" name="fkID_usuario" value=<?php echo $_COOKIE["log_brick_id"] ?>>                
                  </div>
                </div> 

                <div hidden="">
                  <div class="input-group">                
                    <input type="text" class="form-control" id="fkID_cliente" name="fkID_cliente">                
                  </div>
                </div>               

                <br>
                <div class="input-group">
                  <label for="" class="">Número de CC de cliente:</label>                
                  <input type="number" class="form-control" id="autoCliente" name="" required="true">
                  <div id="res_autocompleta"></div>
                </div>

                <br>
                <div class="input-group">
                  <label for="fecha" data-type="datepicker" class="input-group-addon">Fecha</label>
                  <input type="text" class="form-control" id="fecha" name="fecha" required="true">                
                </div>

                <br>
                <h4 class="text-center">Total Costo</h4>
                <hr>

                <div class="input-group">
                  <label for="valor_total" class="input-group-addon">$</label>
                  <input type="number" class="form-control" id="valor_total" name="valor_total" required="true" readonly="">                
                </div>
              </form>
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
              <br>
              <button id="btn_action_cotizacion" type="button" class="btn btn-success" data-action="-"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
          </div>
          
        </div>
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->        
      </div>
    </div>
  </div>
</div>
<!-- /form modal 2-->

<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<div class="container">

	<div class="row">

        <div class="box">

                <div class="col-lg-12">

                	<hr>
                    <h1 class="text-center">Cotización</h1>
        		    <hr>
                    <br>

                    <div class="col-lg-12 text-center">                        
                        <hr>
                        <h2>Cálculo de Materiales
                            <br>
                            <small>Para Pared</small>                            
                        </h2>

                        <span class="flaticon-walls1 logo-cotiza"></span>

                        <br>                        
                            <button id="btn_nuevoCotiza" type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_modal_cotizacion"><span class="glyphicon glyphicon-plus"></span> Nuevo Cálculo</button>                        
                        <hr>

                        <div hidden="">
                          <input id="tipo_user" type="text" value=<?php echo $_COOKIE["log_brick_tipo"] ?> >
                          <input id="id_cliente" type="text" value=<?php 
                                                                      //echo $_COOKIE["log_brick_idCli"]
                                                                      if( isset($_COOKIE["log_brick_idCli"]) ){
                                                                        //echo "S esta";
                                                                        echo $_COOKIE["log_brick_idCli"];
                                                                      } else{
                                                                        
                                                                      }
                                                                    ?> >
                          <input id="cedula_user" type="text" value=<?php echo $_COOKIE["log_brick_num_cc"] ?> >
                        </div>
                        <br>
                        <div class="table-responsive">
                        <!-- tabla de clientes -->
                          <table id="tabla_clientes" class="table table-bordered table-hover table-striped">

                                      <thead>
                                          <tr>
                                              <th>ID Cotizacion</th>
                                              <th>Cliente</th>
                                              <th>Usuario</th>
                                              <th>Fecha-Hora</th>
                                              <th>Materiales</th>
                                              <th>Total</th>                                                                                                                                  
                                              <th>Opciones</th>
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <?php
                                              //print_r($_COOKIE); 
                                              $cotizacioninst->getTablaCotizacion($_COOKIE["log_brick_tipo"],$_COOKIE["log_brick_id"]);                           
                                           ?>
                                      </tbody>
                          </table>
                          <!-- /tabla de materiales -->
                      </div>
                        
                    </div>

                    
                </div>
        </div>

    </div>

</div>