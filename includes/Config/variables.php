<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

return array(

    'cliente' => array(
        'group'       => 'Cliente',
        'label'       => 'Cliente',
        'icon'        => '👤',
        'token'       => '{cliente}',
        'description' => 'Nombre completo del cliente',
        'example'     => 'Juan Pérez'
    ),

    'pedido' => array(
        'group'       => 'Pedido',
        'label'       => 'Pedido',
        'icon'        => '📦',
        'token'       => '{pedido}',
        'description' => 'Número del pedido',
        'example'     => '246'
    ),

    'productos' => array(
        'group'       => 'Productos',
        'label'       => 'Productos',
        'icon'        => '🛒',
        'token'       => '{productos}',
        'description' => 'Lista de productos',
        'example'     => "Vestido Negro x2\nPolo Blanco x1"
    ),

    'total' => array(
        'group'       => 'Total',
        'label'       => 'Total',
        'icon'        => '💰',
        'token'       => '{total}',
        'description' => 'Monto total',
        'example'     => 'S/ 149.90'
    ),

    'mensaje_cliente' => array(
        'group'       => 'Comentarios',
        'label'       => 'Comentario',
        'icon'        => '📝',
        'token'       => '{mensaje_cliente}',
        'description' => 'Comentario del cliente',
        'example'     => 'Entregar después de las 5 PM'
    ),

);