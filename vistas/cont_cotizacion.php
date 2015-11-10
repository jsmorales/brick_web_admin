<?php 

    include("../controller/materialesController.php");

    $materialesinst = new MaterialesController();

 ?>
<!-- form modal -->
<div id="frm_calcula_pared" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Cálculo de Materiales para Pared</h4>
      </div>
      <div class="modal-body">
        <form id="form_calc_cotiza" class="form-horizontal" method="POST">
            
            <h4 class="text-center">Medidas Pared</h4>
            <hr>

            <br>              
                <div class="input-group">
                  <label for="altoP" class="input-group-addon">Alto</label>
                  <input type="number" class="form-control" id="altoP" name="altoP" placeholder="Alto de la pared en metros" required = "true">
                  <div class="input-group-addon">Metros</div>
                </div>
                <br>
                <div class="input-group">
                  <label for="anchoP" class="input-group-addon">Ancho</label>
                  <input type="number" class="form-control" id="anchoP" name="anchoP" placeholder="Ancho de la pared en metros" required = "true">
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
                <input type="number" class="form-control" id="total_lad" name="total_lad">
                <div class="input-group-addon">Unidad(es)</div>
              </div>
              <br>
              <div class="input-group">
                <label for="precio_lad_total" class="input-group-addon">$</label>
                <input type="number" class="form-control" id="precio_lad_total" name="precio_lad_total">
                <div class="input-group-addon">Costo</div>
              </div>

              <br>
              <h4 class="text-center">Total Cemento</h4>
              <hr>
              <div class="input-group">
                <label for="parcial_cem" class="input-group-addon">Estimado Parcial</label>
                <input type="number" class="form-control" id="parcial_cem" name="parcial_cem">
                <div class="input-group-addon">Kg</div>
              </div>
              <br>
              <div class="input-group">
                <label for="total_cem" class="input-group-addon">Cantidad</label>
                <input type="number" class="form-control" id="total_cem" name="total_cem">
                <div class="input-group-addon">Unidad(es)</div>
              </div>
              <br>
              <div class="input-group">
                <label for="precio_cem_total" class="input-group-addon">$</label>
                <input type="number" class="form-control" id="precio_cem_total" name="precio_cem_total">
                <div class="input-group-addon">Costo</div>
              </div>

              <br>
              <h4 class="text-center">Total Costo</h4>
              <hr>

              <div class="input-group">
                <label for="total_cotiza" class="input-group-addon">$</label>
                <input type="number" class="form-control" id="total_cotiza" name="total_cotiza">                
              </div>

            </div>

      </div>
      <div class="modal-footer">        
        <button id="btnCalcula" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Calcular</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Large modal -->

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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#frm_calcula_pared"><span class="glyphicon glyphicon-plus"></span> Nuevo Cálculo</button>                        
                        <hr>
                    </div>

                    
                </div>
        </div>

    </div>

</div>