<?php
    elgg_register_event_handler('init', 'system', 'tap_list_init');
    
    function tap_list_init() {
        $funcion = 'list_page_handler';
        elgg_register_page_handler('tap_list', $funcion);
    }
    
    function list_page_handler() {
        $user = elgg_get_logged_in_user_entity();
		$num = 1;
		$form = require_once('listado.php');  
        $params = cargaArray('Torneo Argentino de Programación', $form, '');
        include('body.php');
    }
?>
