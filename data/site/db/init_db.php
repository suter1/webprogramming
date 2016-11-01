<?php
require_once('connection.php');
$drop = false;
$database = new Database();
$database->connect();
$varchar = 'varchar(255)';
$datetime = 'datetime';
$money = 'DECIMAL(5,2)';
$tables = [
    'users' => [
        'id'                => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'first_name'        => $varchar,
        'last_name'         => $varchar,
        'email'             => $varchar,
        'email_confirmed'   => 'boolean',
        'address'           => $varchar,
        'sex'               => $varchar,
        'budget'            => $money,
        'paypal_address'    => $varchar,
        'is_admin'          => 'boolean',
        'username'          => $varchar],

    'pictures' => [
        'id'                => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'title'             => $varchar . " NOT NULL",
        'path'              => $varchar . " NOT NULL",
        'thumbnail_path'    => $varchar . " NOT NULL",
        'camera_model'      => $varchar,
        'lens'              => $varchar,
        'width'             => 'int(6)' . " NOT NULL",
        'height'            => 'int(6)' . " NOT NULL",
        'aperture'          => $varchar,
        'exposure_time'     => $varchar,
        'created_at'        => "$datetime NOT NULL",
        'uploaded_at'       => "$datetime NOT NULL",
        'owner_id'          => 'int' . " NOT NULL",
        'FOREIGN KEY'       => '(owner_id) REFERENCES users(id)'
    ],

    'orders' => [
        'id'                => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'order_date'        => $datetime,
        'price'             => $money,
        'user_id'           => 'int(6) NOT NULL',
        'FOREIGN KEY'       => '(user_id) REFERENCES users(id)',
    ],

    'pictures_orders' => [
        'picture_id'        => 'int(6) NOT NULL PRIMARY KEY',
        'order_id'          => 'int(6) NOT NULL PRIMARY KEY',
        'size'              => $varchar,
        'price'             => $money,
        'FOREIGN KEY'       => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (order_id) REFERENCES orders(id)',
    ],

    'special_offers' => [
        'id'                => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'start'             => "$datetime NOT NULL",
        'end'               => "$datetime NOT NULL",
    ],

    'offers_pictures' => [
        'offer_id'          => 'int(6) NOT NULL PRIMARY KEY',
        'picture_id'        => 'int(6) NOT NULL PRIMARY KEY',
        'new_price'         => $money,
        'FOREIGN KEY'       => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (offer_id) REFERENCES offers(id)'
    ],

    'payouts' => [
        'id'                => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'execution'         => "$datetime NOT NULL",
        'user_id'           => 'int(6) NOT NULL',
        'total_payout'      => $money,
        'state'             => 'enum',
        'FOREIGN KEY'       => '(user_id) REFERENCES users(id)',
    ],

    'ratings' => [
        'picture_id'                => 'int(6) NOT NULL PRIMARY KEY',
        'user_id'                   => 'int(6) NOT NULL PRIMARY KEY',
        'value'                     => 'int(1) NOT NULL',
        'FOREIGN KEY'               => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (user_id) REFERENCES users(id)'
    ],
];

foreach($tables as $table => $columns){
    $database->create_table($table, $columns);
}

$database->disconnect();