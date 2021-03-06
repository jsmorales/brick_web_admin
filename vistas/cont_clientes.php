<?php 
    include("../controller/clientesController.php");

    $clientes = new ClientesController();
 ?>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
<!-- Form clientes -->
<div class="modal fade bs-example-modal-lg" id="form_modal_clientes" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lbl_form_cliente">-</h4>
      </div>
      <div class="modal-body">
        <!-- form modal contenido -->

                <form id="form_cliente" class="form-horizontal" method="POST">
                <br>
                    <div class="form-group" hidden>                     
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pkID" name="pkID">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="num_cc" class="col-sm-2 control-label">*Número de Identificación(NIT o número de cédula)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="num_cc" name="num_cc" placeholder="Número de Cédula o identificación del Cliente" required = "true">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="razon_social" class="col-sm-2 control-label">Razón Social</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Nombre de Empresa">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nom_cliente" class="col-sm-2 control-label">*Nombre(s)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom_cliente" name="nom_cliente" placeholder="Nombres del Cliente" required = "true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ape_cliente" class="col-sm-2 control-label">*Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ape_cliente" name="ape_cliente" placeholder="Apellidos del Cliente" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono del Cliente">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del Cliente">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">*Correo Electrónico</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico del Cliente" required="true">
                        </div>
                    </div>

                    <label for="">* Datos Requeridos.</label>

                </form>

        <!-- /form modal contenido-->
      </div>
      <div class="modal-footer">        
        <button id="btn_actionCliente" type="button" class="btn btn-primary" data-action="-">
            <span id="lbl_btn_actionCliente"></span>
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
                    <h1 class="text-center">Clientes</h1>
        		    <hr>
                    <br>

                    <div class="table-responsive">
                    <!-- tabla de clientes -->
                        <table id="tabla_clientes" class="table table-bordered table-hover table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID Cliente</th>
                                            <th>Número de Identificación</th>
                                            <th>Razón Social</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Email</th>                                        
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php                                       

                                            $clientes->getTablaClientes();

                                         ?>
                                    </tbody>
                        </table>
                        <!-- /tabla de materiales -->
                    </div>
                    <button id="btn_nuevoCliente" type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal_clientes"><span class="glyphicon glyphicon-plus"></span>&nbspCrear Cliente</button> 

                </div>
        </div>

    </div>

</div>