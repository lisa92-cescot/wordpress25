<?php

//Blocca l'esecuzione in caso di accesso diretto//
defined('ABSPATH') || exit;

//Funzione di registrazione anonima//
add_action('init', function() {
    register_block_type(__DIR__);
});

//Funzione esplicita//

/*function registe_my_block() {
    register_block_type(__DIR__);
}
add_action('init', 'registe_my_block');
*/
