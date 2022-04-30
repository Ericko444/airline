<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'vol' => [
        'title' => 'Vols',

        'actions' => [
            'index' => 'Vols',
            'create' => 'New Vol',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'avion_id' => 'Avion',
            'date_depart' => 'Date depart',
            'lieu_arrivee_id' => 'Lieu arrivee',
            'lieu_depart_id' => 'Lieu depart',
            
        ],
    ],

    'lieu' => [
        'title' => 'Lieus',

        'actions' => [
            'index' => 'Lieus',
            'create' => 'New Lieu',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'avion' => [
        'title' => 'Avions',

        'actions' => [
            'index' => 'Avions',
            'create' => 'New Avion',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'nombreplaces' => 'Nombreplaces',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'designation' => 'Designation',
            
        ],
    ],

    'categorie-age' => [
        'title' => 'Categorie Ages',

        'actions' => [
            'index' => 'Categorie Ages',
            'create' => 'New Categorie Age',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'age_max' => 'Age max',
            'age_min' => 'Age min',
            'designation' => 'Designation',
            
        ],
    ],

    'reservation' => [
        'title' => 'Reservations',

        'actions' => [
            'index' => 'Reservations',
            'create' => 'New Reservation',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorie_id' => 'Categorie',
            'montant' => 'Montant',
            'places' => 'Places',
            'vol_aller_id' => 'Vol aller',
            'vol_retour_id' => 'Vol retour',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];