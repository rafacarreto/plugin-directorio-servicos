<?php

//services-list shortcode: [services-list-principal]

function services_list_principal(){
    ob_start();
    include SERVICELIST_PLUGIN_DIR . "pages/directorio-servicios-principal-maqueta.php";
    return ob_get_clean();
}
add_shortcode('services-list-principal', 'services_list_principal');


?>