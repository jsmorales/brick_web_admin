<?php
	include_once '../controller/contactoController.php';
    $cont_Nosotros = new contactoController();
 ?>
<div class="container">

	<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="text-center">Contacto                    
                    </h2>
                    <hr>
                </div>

 				<div class="col-md-8">
                    <?php 
                    	$cont_Nosotros->mapa();
                     ?>
                </div>

                <div class="col-md-4">

                	<?php 
                		$cont_Nosotros->datos_contacto();
                	 ?>                   

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- /.container -->