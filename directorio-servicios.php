<?php
/*
Plugin Name: Directorio de Servicios medicos FVL
plugin URI: rafacarreto.com
Description: Este plugin muestra los diferentes servicios que se prestan en cada sede 
para mostrar los servicios agregue el siguiente shortcode [services-list]
Author: Rafael Carreno Olaya
*/


define('SERVICELIST_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

require_once SERVICELIST_PLUGIN_DIR . 'includes/directorio-servicios-principal-shortcodes.php';

require_once SERVICELIST_PLUGIN_DIR . 'includes/directorio-servicios-shortcodes.php';

require_once SERVICELIST_PLUGIN_DIR . 'includes/sedes-servicios-shortcodes.php';


add_action( 'wp_enqueue_scripts','directorio_servicios_scr' );

function directorio_servicios_scr(){
    $plugin_dir = plugin_dir_url( __FILE__ );
    wp_enqueue_script('directorio_servicios_js', $plugin_dir . '/assets/js/scripts.js');
    wp_enqueue_style( 'plugin-styles', $plugin_dir . '/assets/css/style.css', array(), '1.1', 'all');
}



