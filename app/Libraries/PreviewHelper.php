<?php
/**
 * Created by PhpStorm.
 * User: ARodriguez
 * Date: 12/8/15
 * Time: 15:48
 */

namespace Networks\Libraries;


class PreviewHelper
{

    private static $NAME_ROUTE = array(
        'profile::index' => 'Perfil',
        'branches::index' => 'Nodos',
        'branches::list' => 'Redes',
        'campaigns::index' => 'Campañas',
    );

    public static function getNameRoute($route)
    {
        if(array_key_exists($route , self::$NAME_ROUTE))
        {
            return self::$NAME_ROUTE[$route];
        }
        return 'indefinida';
    }
}