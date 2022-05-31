<?php

//sedes in service page shortcode: [sedes-service]

function sedes_in_service(){

    include SERVICELIST_PLUGIN_DIR . "pages/sedes-in-service-maqueta.php";

}
add_shortcode('sedes-service', 'sedes_in_service');
