<?php 

// Use this code to get the rate_id, you will need it to set it as the default
if( count( WC()->session->get('shipping_for_package_0')['rates'] ) > 0 ){
    foreach( WC()->session->get('shipping_for_package_0')['rates'] as $rate_id =>$rate)
        if($rate->method_id == 'wf_shipping_ups'){
            $default_rate_id = array( $rate_id );
            break;
        }