<?php

//services-list shortcode: [services-list]

function services_list(){
    ob_start();
    include SERVICELIST_PLUGIN_DIR . "pages/directorio-servicios-maqueta.php";
    return ob_get_clean();
}
add_shortcode('services-list', 'services_list');


?>