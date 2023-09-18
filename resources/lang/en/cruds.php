<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'zone' => [
        'title'             => 'Zones',
        'title_singular'    => 'Zone',
        'fields'            => [
            'id'                    => 'ID',
            'name'                  => 'Name',
        ],
    ],
    'sub_zone' => [
        'title'             => 'Sub Zones',
        'title_singular'    => 'Sub Zone',
        'fields'            => [
            'id'                    => 'ID',
            'name'                  => 'Name',
            'zone_name'             => 'Zone Name'
        ],
    ],
    'hotel' => [
        'title'             => 'All Hotels',
        'title_singular'    => 'Hotel',
        'fields'            => [
            'id'                    => 'ID',
            'name'                  => 'Hotel Name',
            'owner'                 => 'Owner Name',
            'image'                 => 'Hotel Image',
            'sr_no'                 => 'Sr No',
            'total_room'            => 'Total Room',
            'phone'                 => 'Phone Number',
            'email'                 => 'Email',
            'address'               => 'Address',
            'web_link'              => 'Website Link',
            'sub_zone_name'         => 'Sub Zone Name',
            'zone_name'             => 'Zone Name'
        ],
    ],
    'news'  => [
        'title'             => 'News',
        'title_singular'    => 'News',
        'fields'            => [
            'id'                    => 'ID',
            'title'                 => 'Title',
            'content'               => 'Content',
            'images'                => 'Images',
            'date'                  => 'Date',
        ]
    ]
];
