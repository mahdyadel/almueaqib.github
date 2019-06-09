<?php

return [
    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'catchs' => 'c,r,u,d',
            'receipts' => 'c,r,u,d',
            'mangs' => 'c,r,u,d',
            'external' => 'c,r,u,d',
            'offecs' => 'c,r,u,d',
            'baptists' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'records' => 'c,r,u,d',
            'workers' => 'c,r,u,d',
            'cashiers' => 'c,r,u,d',
            'sadads' => 'c,r,u,d',
        ],
        'admin' => []
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
