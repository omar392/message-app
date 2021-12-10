<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [

        'super_admin'=>[

            // 'teams'=>'c,r,u,d',
            'users'=>'c,r,u,d',
            'admins'=>'c,r,u,d',
            'references'=>'c,r,u,d',
            'messages'=>'c,r,u,d',
            'introductions'=>'c,r,u,d',
            'contacts'=>'c,r,u,d',
            'roles'=>'c,r,u,d',
            'settings' => 'r,u',
            'abouts' => 'r,u',

        ]

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
