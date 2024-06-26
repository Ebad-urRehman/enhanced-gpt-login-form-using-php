<?php
$server_name = 'localhost';
$server_username = 'root';
$server_password = '';
$dbname = 'user_details';
# create connection
$connection = new mysqli($server_name, $server_username, $server_password, $dbname);

if ($connection -> connect_error) {
    die('connection failed: ' . $connection->connection_error);
}
?>