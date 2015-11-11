
<?php 

    class scripts_pag {        

        public function standar(){

            echo '<!-- jQuery -->
                <script src="../js/jquery.js"></script>
                <script src="../js/plugins/autocompleta/jquery-ui.min.js"></script>
                

                <!-- Bootstrap Core JavaScript -->
                <script src="../js/bootstrap.min.js"></script>

                <!-- -->

                <!-- plugin para validar -->
                <script src="../js/plugins/validav1/valida_p_v1.js"></script>
                <!-- plugin para paginar -->
                <script src="../js/plugins/DataTables/jquery.dataTables.min.js"></script>
                <script src="../js/plugins/DataTables/data_tabla.js"></script>
                <!-- plugin para calendario -->
                <script src="../js/plugins/calendario/moment.min.js"></script>                
                <script src="../js/plugins/calendario/jquery-ui-timepicker-addon.js"></script>
                <script src="../js/plugins/calendario/calendarCotizacion.js"></script>                
                
                ';

            echo "<!-- Script to Activate the Carousel -->
                    <script>
                    $('.carousel').carousel({
                        interval: 5000 //changes the speed
                    })
                    </script>";
        }

        public function special($arr_script){

            $this->standar();

            for ($i=0; $i < sizeof($arr_script); $i++) { 
                # code...
                echo '<script src="../js/scripts_cont/'.$arr_script[$i].'"></script>';
            }
        }
    }

 ?>
