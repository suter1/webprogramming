<?php
require_once('connection.php');
$drop = false;
$database = new Database();
$database->connect();
$varchar = 'varchar(255)';
$tables = [
    'users' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'first_name' => $varchar,
        'last_name' => $varchar,
        'email' => $varchar,
        'email_confirmed' => 'boolean',
        'address' => $varchar,
        'sex' => $varchar,
        'budget' => 'money',
        'paypal_address' => $varchar,
        'is_admin' => 'boolean',
        'username' => $varchar],

    'pictures' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'title' => $varchar . " NOT NULL",
        'path' => $varchar . " NOT NULL",
        'thumbnail_path' => $varchar . " NOT NULL",
        'camera_model' => $varchar,
        'lens' => $varchar,
        'width' => 'int(6)' . " NOT NULL",
        'height' => 'int(6)' . " NOT NULL",
        'aperture' => $varchar,
        'exposure_time' => $varchar,
        'created_at' => 'datetime NOT NULL',
        'uploaded_at' => 'datetime NOT NULL',
        'owner_id' => 'int' . " NOT NULL",
        'FOREIGN KEY' => '(owner_id) REFERENCES users(id)'],

    'orders' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        '' => ''],

    'pictures_orders' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    ],

    'special_offers' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',],

    'offers_pictures' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',],

    'payouts' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',],

    'ratings' => ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',],
];

foreach($tables as $table => $columns){
    $database->create_table($table, $columns);
}

$database->disconnect();