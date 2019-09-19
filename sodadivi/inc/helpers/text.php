<?php


function underscoreToCamelCase( $string, $capitalizeFirstCharacter = true ) {

    $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

    if ( ! $capitalizeFirstCharacter ) {
        $str[0] = strtolower( $str[0] );
    }

    return $str;
}
