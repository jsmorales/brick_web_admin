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
                  <label for="alto" class="input-group-addon">Alto</label>
                  <input type="number" class="form-control" id="alto" name="alto" placeholder="Alto de la pared en metros" required = "true">
                  <div class="input-group-addon">M</div>
                </div>
                <br>
                <div class="input-group">
                  <label for="ancho" class="input-group-addon">Ancho</label>
                  <input type="number" class="form-control" id="ancho" name="ancho" placeholder="Ancho de la pared en metros" required = "true">
                  <div class="input-group-addon">M</div>
                </div>
        </form>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Calcular</button>
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