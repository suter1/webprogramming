<?php
require_once('connection.php');
$drop = false;
$database = new Database();
$database->connect();
$varchar = 'varchar(255)';
$datetime = 'datetime';
$default_int = 'int(6)';
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
        'id'                => "$default_int NOT NULL AUTO_INCREMENT PRIMARY KEY",
        'title'             => $varchar . " NOT NULL",
        'path'              => $varchar . " NOT NULL",
        'thumbnail_path'    => $varchar . " NOT NULL",
        'camera_model'      => $varchar,
        'lens'              => $varchar,
        'width'             => $default_int . " NOT NULL",
        'height'            => $default_int . " NOT NULL",
        'aperture'          => $varchar,
        'exposure_time'     => $varchar,
        'created_at'        => "$datetime NOT NULL",
        'uploaded_at'       => "$datetime NOT NULL",
        'owner_id'          => $default_int . " NOT NULL",
        'FOREIGN KEY'       => '(owner_id) REFERENCES users(id)'
    ],

    'orders' => [
        'id'                => $default_int . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'order_date'        => $datetime,
        'price'             => $money,
        'user_id'           => $default_int . ' NOT NULL',
        'FOREIGN KEY'       => '(user_id) REFERENCES users(id)',
    ],

    'pictures_orders' => [
        'picture_id'        => $default_int . ' NOT NULL',
        'order_id'          => $default_int . ' NOT NULL',
        'size'              => $varchar,
        'price'             => $money,
        'FOREIGN KEY'       => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (order_id) REFERENCES orders(id)',
    ],

    'special_offers' => [
        'id'                => $default_int . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'start'             => "$datetime NOT NULL",
        'end'               => "$datetime NOT NULL",
    ],

    'offers_pictures' => [
        'offer_id'          => $default_int . ' NOT NULL',
        'picture_id'        => $default_int . ' NOT NULL',
        'new_price'         => $money,
        'FOREIGN KEY'       => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (offer_id) REFERENCES special_offers(id)'
    ],

    'payouts' => [
        'id'                => $default_int . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'execution'         => "$datetime NOT NULL",
        'user_id'           => $default_int . ' NOT NULL',
        'total_payout'      => $money,
        'state'             => 'enum("full_size", "half_size", "thumbnail")',
        'FOREIGN KEY'       => '(user_id) REFERENCES users(id)',
    ],

    'ratings' => [
        'picture_id'        => $default_int . ' NOT NULL',
        'user_id'           => $default_int . ' NOT NULL',
        'value'             => 'int(1) NOT NULL',
        'FOREIGN KEY'       => '(picture_id) REFERENCES pictures(id), FOREIGN KEY (user_id) REFERENCES users(id)'
    ],
    'tags' => [
        'id'                => $default_int . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'name'              => $varchar . ' NOT NULL',
    ],
    'pictures_tags' => [
        'tag_id'            => $default_int . ' NOT NULL',
        'picture_id'        => $default_int . ' NOT NULL',
    ],
];

foreach($tables as $table => $columns){
    $database->create_table($table, $columns);
}

$database->disconnect();