<?php

/** 
 * @package meppsshipping
*/
/*
Plugin Name: Default Shipping
Plugin URI: https://github.com/meppps/wc-default-shipping
Description: Set UPS ground as default shipping option
Version: 1.0
Author: Mikey Epps
Author URI: http://github.com/meppps
License: GPLv2 or later
*/

// security precaution
if(!defined('ABSPATH')){
    exit;
}

// set default
add_action( 'woocommerce_before_cart', 'set_default_chosen_shipping_method', 5 );
function set_default_chosen_shipping_method(){
    // find method id for desired default option eg wf_shipping_ups
    if( count( WC()->session->get('shipping_for_package_0')['rates'] ) > 0 ){
        foreach( WC()->session->get('shipping_for_package_0')['rates'] as $rate_id =>$rate)
            if($rate->method_id == 'wf_shipping_ups'){
                $default_rate_id = array( $rate_id );
                break;
            }

        WC()->session->set('chosen_shipping_methods', $default_rate_id );
    }
}
