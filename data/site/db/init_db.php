<?php
require_once('connection.php');
$drop = true;
$database = new Database();
$database->connect();
$varchar = 'varchar(255)';
$database->create_table("roles", ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY', 'name' => 'varchar(255)'], false);
$database->create_table("users", ['id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'first_name' => $varchar,
    'last_name' => $varchar,
    'email' => $varchar,
    'address' => $varchar,
    'sex' => $varchar,
    'username' => $varchar,
    'role_id' => 'int',
    'FOREIGN KEY' => '(role_id) REFERENCES roles(id)'], false);
$database->create_table("images", [
    'id' => 'int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY',
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
    'FOREIGN KEY' => '(owner_id) REFERENCES users(id)'], true);
$database->disconnect();