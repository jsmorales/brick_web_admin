<?php
    include_once '../controller/nosotrosController.php';
    $cont_Nosotros = new nosotrosController();
 ?>
<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <?php 
                        //$cont_Nosotros->acercaDe();

                        $cont_Nosotros->mision();                        

                        $cont_Nosotros->vision();

                     ?>
                </div>
            </div>
        </div>	
</div>