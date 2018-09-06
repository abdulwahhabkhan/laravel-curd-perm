<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 27/03/2018
 * Time: 23:24
 */

return [
            'dashboard'=>[
                'label' => 'Dashboard',
                'icon'  => 'fa fa-laptop',
                'url'   => 'javascript:;',
                'sub' => [
                    [
                        'label' => 'Dashboard v1',
                        'url'   => 'home',
                    ],[
                        'label' => 'Dashboard v1',
                        'url'   => 'dashboard',
                    ]

                ]
            ],
            'sales' => [
                'label' => 'Sales',
                'icon'  => 'fa fa-bar-chart',
                'url'   => 'javascript:;',
                'sub'   => [
                    [
                        'label' => 'Customers',
                        'url'   => 'customer.list'
                    ],
                    [
                        'label' => 'Sales',
                        'url'   => 'sale.list'
                    ]
                ]
            ],
                    'config' => [
                'label' => 'Config',
                'icon' => 'fa fa-cog',
                'url'  => 'javascript:;',
                'sub' => [
                    [
                        'label' => 'Users',
                        'url' => 'user.list'
                    ],
                    [
                        'label' => 'Roles',
                        'url'   => 'role.list'
                    ]
                ]
            ]
    ];