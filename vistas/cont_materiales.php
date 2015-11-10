<?php 

	include("../controller/materialesController.php");

    $materialesinst = new MaterialesController();

	//$materiales = MaterialesController::getMateriales();
	//$materiales->getMateriales();
	//print_r($materiales);
 ?>
 <!-- form modal -->
 <div class="modal fade bs-example-modal-lg" id="form_modal_materiales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_material">-</h4>
      </div>
      <div class="modal-body">
      	<!-- form modal contenido -->

        <!-- Nav tabs -->
		  <ul id="myTab" class="nav nav-tabs nav-modal" role="tablist">
		    <li role="presentation" class="active"><a href="#materialTab" aria-controls="home" role="tab" data-toggle="tab">Material</a></li>
		    <li role="presentation"><a href="#propiedadesTab" aria-controls="profile" role="tab" data-toggle="tab">Propiedades</a></li>		    
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		  	<!-- 1 -->
		    <div role="tabpanel" class="tab-pane active" id="materialTab">
		    	<!-- formulario 1 materiales -->
		    	<form id="form_material" class="form-horizontal" enctype="multipart/form-data" method="POST">
		    	<br>
		    		<div class="form-group" hidden>				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="pkID" name="pkID">
				    	</div>
				  	</div>
		    		<div class="form-group">
				    	<label for="nombre" class="col-sm-2 control-label">Nombre</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre específico del Material" required = "true">
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="precio" class="col-sm-2 control-label">Precio</label>
				    	<div class="col-sm-10">
				      		<div class="input-group">
						      <div class="input-group-addon">$</div>
						      <input type="number" class="form-control" id="precio" name="precio" placeholder="1000" required = "true">						      
						    </div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="marca" class="col-sm-2 control-label">Marca</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del Material">
				    	</div>
				  	</div>
				  	<div class="form-group">
                        <label for="imagen_sube" class="col-sm-2 control-label">Imagen</label>
                        <input id="imagen_sube" type="file" name="imagen_sube">
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div id="not_img" hidden>hola</div>                       
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    </div>
                    <div class="form-group" hidden>                    
                        <input type="text" id="imagen" name="imagen" value="" class="form-control" required = "true">
                    </div>
                    <div class="form-group">
                        <label for="clase" class="col-sm-2 control-label">Clase</label>
                        <div class="col-sm-10">
                            <select name="fkID_clase" id="fkID_clase" class="form-control" required = "true">
                                <option value="5">Seleccione una Clase</option>                                
                                <?php 
                                    $claseSelect = $materialesinst->getClase();
                                    for ($i=0; $i < sizeof($claseSelect); $i++) {
                                        echo '<option value="'.$claseSelect[$i]["pkID"].'">'.$claseSelect[$i]["nombre"].'</option>';
                                    };
                                 ?>
                            </select>
                        </div>                        
                    </div>
		    	</form>
		    	<!-- /formulario 1 materiales -->
		    </div>
		    <!-- /1 -->
		    <!-- 2 -->
		    <div role="tabpanel" class="tab-pane" id="propiedadesTab" hidden>
		      <br>
                <form id="form_propiedades" class="form-horizontal">
                    <div class="form-group">
                        <label for="propiedad" class="col-sm-2 control-label">Propiedad</label>
                        <div class="col-sm-10">
                            <select name="fkID_propiedad" id="fkID_propiedad" class="form-control">
                                <option>Seleccione una propiedad</option>                                
                                <?php 
                                    $propiedadSelect = $materialesinst->getPropiedades();
                                    for ($i=0; $i < sizeof($propiedadSelect); $i++) {
                                        echo '<option value="'.$propiedadSelect[$i]["pkID"].'">'.$propiedadSelect[$i]["nombre"].'</option>';
                                    };
                                 ?>
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Valor</label>
                        <div class="col-sm-10">
                            <input id="valor" type="text" name="valor" class="form-control" placeholder="Valor para esta propiedad">                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Unidad de medida</label>
                        <div class="col-sm-10">
                            <select name="fkID_uMedida" id="fkID_uMedida" class="form-control">
                                <option>Seleccione una medida</option>
                                <?php 
                                    $uMedidaSelect = $materialesinst->getUniMedida();
                                    for ($i=0; $i < sizeof($uMedidaSelect); $i++) {
                                        echo '<option value="'.$uMedidaSelect[$i]["pkID"].'">'.$uMedidaSelect[$i]["abreviatura"].'</option>';
                                    };
                                 ?>
                            </select>
                        </div>                        
                    </div>
                </form>
              <button id="btn_creaPropiedad" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Añadir propiedad</button>

                    <div id="gestionPropiedades">
                      <div class="page-header">
                        <h3>Propiedades para este Material</h3>
                      </div>
                      <ul id="listaPropiedades" class="list-group">
                        <!--
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li> -->
                      </ul>
                    </div>
                
		      </div>
		    <!-- /2 -->		    
		  </div>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionMaterial" type="button" class="btn btn-primary" data-action="-">
        	<span id="lbl_btn_actionMaterial"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /form modal -->

 <div class="container">

	<div class="row">

        <div class="box">

                <div class="col-lg-12">

                    <hr>
                    <h1 class="text-center">Materiales</h1>
        		    <hr>
                    <br>
                    <div class="table-responsive">
            		    <!-- tabla de materiales -->
            		    <table id="tabla_materiales" class="table table-bordered table-hover table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID Material</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Marca</th>
                                            <th>Imagen</th>
                                            <th>Propiedades</th>
                                            <th>Clase</th>										
    										<th>Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    	<?php                               		

                                            $materialesinst->getTablaMateriales();

                                    	 ?>
                                    </tbody>
                        </table>
                    </div>
        		    <!-- /tabla de materiales -->
        		    <button id="btn_nuevoMaterial" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_materiales"><span class="glyphicon glyphicon-plus"></span>&nbspCrear Material</button> 
                    <!--  
                    <button id="btn_pagina">Paginar</button>-->
                </div>

               <!-- /box --> 
            </div>
        <!-- /.col-lg-12 -->
    </div>
<!-- /container -->            
</div>