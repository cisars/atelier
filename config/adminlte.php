<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'ATELIER',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>Atelier</b> Talleres',
    // 'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img' => 'img/atelier1.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Taller de Concesionario',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */


    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'text-light',
    'classes_auth_btn' => 'btn-flat btn-light',
    /* //default theme
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',
*/

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    | https://thetheme.io/theadmin/layout/sidebar-doc.html solucion
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-gray elevation-4',
    //'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',
    //'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-ligth',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-dark',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    // Original menu */
    /*
'menu' => [
    [
        'text' => 'Busqueda',
        'search' => false,
        'topnav' => true,
    ],
    [
        'text' => 'blog',
        'url'  => 'admin/blog',
        'can'  => 'manage-blog',
    ],
    [
        'text'        => 'pages',
        'url'         => 'admin/pages',
        'icon'        => 'far fa-fw fa-file',
        'label'       => 4,
        'label_color' => 'success',
    ],
    ['header' => 'account_settings'],
    [
        'text' => 'profile',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-fw fa-user',
    ],
    [
        'text' => 'change_password',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-fw fa-lock',
    ],
    [
        'text'    => 'multilevel',
        'icon'    => 'fas fa-fw fa-share',
        'submenu' => [
            [
                'text' => 'level_one',
                'url'  => '#',
            ],
            [
                'text'    => 'level_one',
                'url'     => '#',
                'submenu' => [
                    [
                        'text' => 'level_two',
                        'url'  => '#',
                    ],
                    [
                        'text'    => 'level_two',
                        'url'     => '#',
                        'submenu' => [
                            [
                                'text' => 'level_three',
                                'url'  => '#',
                            ],
                            [
                                'text' => 'level_three',
                                'url'  => '#',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'text' => 'level_one',
                'url'  => '#',
            ],
        ],
    ],
    ['header' => 'labels'],
    [
        'text'       => 'important',
        'icon_color' => 'red',
        'url'        => '#',
    ],
    [
        'text'       => 'warning',
        'icon_color' => 'yellow',
        'url'        => '#',
    ],
    [
        'text'       => 'information',
        'icon_color' => 'cyan',
        'url'        => '#',
    ],
],


       [
        'text'        => 'pages',
        'url'         => '#',
        'icon'        => 'far fa-fw fa-file',
        'label'       => 4,
        'label_color' => 'success',
    ],
*/
    // MIMENU
    'menu' => [
        [
            'text' => 'Busqueda',
            'search' => false,
            'topnav' => true,
        ],
        [
            'text' => 'blog',
            'url' => 'admin/blog',
            'can' => 'manage-blog',
        ],
        [
            'text' => 'pages',
            'url' => 'admin/pages',
            'icon' => 'far fa-fw fa-file',
            'label' => 4,
            'label_color' => 'success',
            'can' => 'sin esta linea',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url' => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'sin esta linea',
        ],
        [
            'text' => 'change_password',
            'url' => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
            'can' => 'sin esta linea',
        ],
        [
            'text' => 'multilevel',
            'icon' => 'fas fa-fw fa-share',
            'can' => 'sin asignar',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url' => '#',
                ],
                [
                    'text' => 'level_one',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url' => '#',
                        ],
                        [
                            'text' => 'level_two',
                            'url' => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url' => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url' => '#',
                ],
            ],
        ],
        ['header' => 'SISTEMA', 'can' => ['admin', 'doc'],],
        [
            'text' => 'SISTEMA',
            'icon' => 'fas fa-fw fa-user-cog',
            'icon_color' => 'maroon',
            'can' => ['admin', 'doc'],
            //'label'         => '1/2',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'usuario', 'text' => 'Usuarios',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'tallerusuario', 'text' => 'Usuarios de Talleres',],
                [
                    'text' => 'Configuraciones',
                    'url' => '#',
                    'icon_color' => 'info',
                    'can' => ['admin', 'doc'],
                    'submenu' => [
                        ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'parametro', 'text' => 'Parámetros',],
                        ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'descanso', 'text' => 'Descanso',],

                    ],
                ],
            ],
        ],

        [
            'text' => 'EMPRESARIAL',
            'icon' => 'fas fa-fw fa-building',
            'icon_color' => 'maroon',
            'can' => ['admin', 'doc'],
            //'label'         => '9/12',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'sucursal', 'text' => 'Sucursales',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'taller', 'text' => 'Talleres',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'sector', 'text' => 'Sectores de trabajo',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'cargo', 'text' => 'Cargos',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'empleado', 'text' => 'Empleados',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'turno', 'text' => 'Turnos de trabajo',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'grupo', 'text' => 'Grupos de trabajos',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'maquinaria_tipo', 'text' => 'Tipo de Maquinaria',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'maquinaria', 'text' => 'Maquinarias',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_asignacionamaquinaria', 'text' => 'Asignación a Maquinarias',],
//                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Feriados Laborales',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_calendarioatencionc', 'text' => 'Calendarios Reservas',],


                [
                    'submenu' => [
                        [ 'url' => 'sucursal/create'],
                        [ 'url' => 'taller/create'],
                        [ 'url' => 'sector/create'],
                        [ 'url' => 'cargo/create'],
                        [ 'url' => 'empleado/create'],
                        [ 'url' => 'turno/create'],
                        [ 'url' => 'grupo/create'],
                        [ 'url' => 'maquinaria_tipo/create'],
                        [ 'url' => 'maquinaria/create'],
                        [ 'url' => '_asignacionamaquinariac'],

                        [ 'url' => '_calendarioatencionc'],
                    ],
                ],
            ],
        ],
        [
            'text' => 'REPUESTOS/SERVICIOS',
            'icon' => 'fas fa-fw fa-toolbox',
            'icon_color' => 'maroon',
            'can' => ['admin', 'doc'],
            // 'label'         => '2/3',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'clasificacion', 'text' => 'Clasificaciones',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'unidad', 'text' => 'Unidades de medidas',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'productoservicio', 'text' => 'Repuestos/Servicios',],
                [
                    'submenu' => [
                        [ 'url' => 'clasificacion/create'],
                        [ 'url' => 'unidad/create'],
                        [ 'url' => 'productoservicio/create'],
                    ],
                ],
            ],
        ],
        [
            'text' => 'CLIENTES',
            'icon' => 'fas fa-fw fa-mug-hot',
            'icon_color' => 'maroon',
            'can' => ['admin', 'doc'],
            //'label'         => '1/3',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'localidad', 'text' => 'Localidades',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'cliente', 'text' => 'Clientes',],
                [
                    'submenu' => [
                        [ 'url' => 'localidad/create'],
                        [ 'url' => 'cliente/create'],
                    ],
                ],
            ],
        ],
        [
            'text' => 'VEHICULOS',
            'icon' => 'fas fa-fw fa-car',
            'icon_color' => 'maroon',
            'can' => ['admin', 'doc'],
            //'label'         => '4/4',
            'label_color' => 'warning',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'color', 'text' => 'Colores',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'marca', 'text' => 'Marcas',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'modelo', 'text' => 'Modelos',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'vehiculo', 'text' => 'Vehiculos',],
                [
                    'submenu' => [
                        [ 'url' => 'color/create'],
                        [ 'url' => 'marca/create'],
                        [ 'url' => 'modelo/create'],
                        [ 'url' => 'vehiculo/create'],
                    ],
                ],
            ],
        ],
        [
            'text' => 'MOVIMIENTOS',
            'icon' => 'fas fa-fw fa-exchange-alt',
            'icon_color' => 'maroon',
            'can' => ['admin'],
            //'label'         => '1/8',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'reserva', 'text' => 'Reservas',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'sintoma', 'text' => 'Síntomas de Vehiculos',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'recepcion', 'text' => 'Recepción de Vehiculos',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'orden_trabajo', 'text' => 'Ordenes de Trabajo', ],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_confirmacionot', 'text' => 'Confirmacion de OTs',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_realizacionot', 'text' => 'Servicios Realizados',],

                ['icon_color' => 'info', 'can' => 'admin', 'url' => '_verificacionot ', 'text' => 'Verificacion de OT ',],
                ['icon_color' => 'info', 'can' => 'admin', 'url' => '_finalizacionot ', 'text' => 'Finalizacion de OT ',],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_entregavehiculo', 'text' => 'Entregas de Vehiculos',],
                [
                    'submenu' => [
                        [ 'url' => 'reserva/create'],
                        [ 'url' => '_realizacionotc'],
                        [ 'url' => '_reservanormalc'],
                        [ 'url' => 'sintoma/create'],
                        [ 'url' => '_recepcionvehiculoc'],
                        [ 'url' => '_confirmacionotc'],
                        [ 'url' => '_verificacionotc'],
                        [ 'url' => '_finalizacionotc'],
                        [ 'url' => '_entregavehiculoc'],
                    ],
                ],
//

                [ 'icon_color' => 'gray',   'can' => ['admin', 'doc'], 'url'=> '#',            'text' => 'Visualizar Prefacturacion', ],
            ],
        ],
        [
            'text' => 'STOCK',
            'icon' => 'fas fa-fw fa-cubes',
            'icon_color' => 'maroon',
            'can' => ['admin'],
            //'label'         => '0/3',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => '_entradarepuesto', 'text' => 'Entrada de Repuestos',],
                 [ 'icon_color' => 'gray',  'can' => ['admin', 'doc'], 'url'=> '#',              'text' => 'Salida de Repuestos', ],

                [
                    'submenu' => [
                        [ 'url' => '_entradarepuestoc'],

                    ],
                ],
            ],
        ],
        [
            'text' => 'INFORMES',
            'icon' => 'fas fa-fw fa-clipboard-list',
            'icon_color' => 'maroon',
            'can' => ['admin'],
            // 'label'         => '0/9',
            'label_color' => 'info',
            'submenu' => [
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'storage/informestock.pdf', 'text' => 'Stock de Manejo', 'target'  => '_blank'],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'storage/informeentregas.pdf', 'text' => 'Entregas de Vehiculos', 'target'  => '_blank'],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'storage/informereservas.pdf', 'text' => 'Reservas', 'target'  => '_blank'],
                ['icon_color' => 'info', 'can' => ['admin', 'doc'], 'url' => 'storage/informeordenes.pdf', 'text' => 'Ordenes de Trabajo', 'target'  => '_blank'],
//                ['icon_color' => 'gray', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Usuarios del Sistema',],
//                ['icon_color' => 'gray', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Accesos de Usuarios',],
//                ['icon_color' => 'gray', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Auditorias del Sistema',],
//                ['icon_color' => 'gray', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Recepciónes de Vehiculos',],
//                ['icon_color' => 'gray', 'can' => ['admin', 'doc'], 'url' => '#', 'text' => 'Entregas de Repuestos',],
                [
                    'submenu' => [
                        [ 'url' => '#'],
                        [ 'url' => '#'],
                        [ 'url' => '#'],
                    ],
                ],
//                [ 'icon_color' => 'gray',  'can' => ['admin', 'doc'], 'url'=> '#',              'text' => 'Entregas', ],
//                [ 'icon_color' => 'gray',  'can' => ['admin', 'doc'], 'url'=> '#',              'text' => 'Entradas de Repuestos', ],
//                [ 'icon_color' => 'gray',  'can' => ['admin', 'doc'], 'url'=> '#',              'text' => 'Salidas de Repuestos', ],
            ],
        ],


                                    ['header' => 'EJEMPLOS BOOTSTRAP', 'can' => ['admin', 'example-bootstrap'],],
                                    [
                                        'text' => 'Datatables',
                                        'icon' => 'fas fa-fw fa-table',
                                        'can' => ['admin', 'example-bootstrap'],
                                        'submenu' => [
                                            ['icon_color' => 'yellow', 'can' => ['admin', 'example-bootstrap'], 'url' => 'data', 'text' => 'Data',],
                                            ['icon_color' => 'yellow', 'can' => ['admin', 'example-bootstrap'], 'url' => 'inline', 'text' => 'Inline',],
                                            ['icon_color' => 'yellow', 'can' => ['admin', 'example-bootstrap'], 'url' => 'flot', 'text' => 'Flot',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'maketemplate', 'text' => 'MKT',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'empleadogen', 'text' => 'EmpleadoGen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'clientegen', 'text' => 'ClienteGen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'producto_serviciogen', 'text' => 'ProductoServicioGen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'parametrogen', 'text' => 'Parametrogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'descansogen', 'text' => 'Descansogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'reservagen', 'text' => 'Reservagen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'recepciongen', 'text' => 'Recepciongen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'orden_repuestogen', 'text' => 'OrdenRepuestogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'orden_serviciogen', 'text' => 'OrdenServiciogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'orden_trabajogen', 'text' => 'OrdenTrabajogen',],

                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'feriadogen', 'text' => 'Feriadogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'entradagen', 'text' => 'Entradagen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'entrada_detallegen', 'text' => 'EntradaDetallegen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'orden_mecanicogen', 'text' => 'OrdenMecanicogen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'empleado_maquinagen', 'text' => 'EmpleadoMaquinagen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'facturagen', 'text' => 'Facturagen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'factura_detallegen', 'text' => 'FacturaDetallegen',],
                                            ['icon_color' => 'maroon', 'can' => 'admin', 'url' => 'entregagen', 'text' => 'Entregagen',],

//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_reservanormal', 'text' => 'reservanormal ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_reservalinea', 'text' => 'reservalinea',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_confirmacionot', 'text' => 'confirmacionot ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_sectorrepuesto', 'text' => 'sectorrepuesto ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_entradarepuesto', 'text' => 'entradarepuesto ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_salidarepuesto', 'text' => 'salidarepuesto ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_asignacionamaquinaria', 'text' => 'asignacionamaquinaria ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_recepcionvehiculo', 'text' => 'recepcionvehiculo ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_calendarioatencion', 'text' => 'calendarioatencion ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_realizacionot', 'text' => 'realizacionot ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_verificacionot', 'text' => 'verificacionot ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_finalizacionot', 'text' => 'finalizacionot ',],
//                                            ['icon_color' => 'yellow', 'can' => 'admin', 'url' => '_entregavehiculo', 'text' => 'entregavehiculo ',],

                                        ],
                                    ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    //'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                    'location' => 'plugins/datatables/jquery.dataTables.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    //'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                    'location' => 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    //'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                    'location' => 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    //'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                    'location' => 'plugins/chart.js/Chart.bundle.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/chart.js/Chart.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/chart.js/Chart.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Tempusdominus' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/moment/moment.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/daterangepicker/daterangepicker.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/daterangepicker/daterangepicker.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
