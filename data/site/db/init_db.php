<?php
require_once('connection.php');
$drop = false;
$database = new Database();
$database->connect();
$varchar = 'varchar(255)';
$database->create_table("roles", ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY', 'name' => 'varchar(255)'], $drop);
$database->create_table("users", ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'first_name' => $varchar,
    'last_name' => $varchar,
    'email' => $varchar,
    'address' => $varchar,
    'sex' => $varchar,
    'username' => $varchar,
    'role_id' => 'int',
    'FOREIGN KEY' => '(role_id) REFERENCES roles(id)'], $drop);
$database->create_table("images", [
    'id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'title' => $varchar,
    'path' => $varchar,
    'thumbnail_path' => $varchar,
    'camera_model' => $varchar,
    'lens' => $varchar,
    'width' => 'int(6)',
    'height' => 'int(6)',
    'aperture' => $varchar,
    'exposure_time' => $varchar,
    'created_at' => 'datetime',
    'owner_id' => 'int',
    'FOREIGN KEY' => '(owner_id) REFERENCES users(id)'], $drop);
$database->disconnect();