<?php
/**
 * Created by PhpStorm.
 * User: Alexandra Halip
 * Date: 22.05.2018
 * Time: 17:02
 */

class ConnectDB extends PDO
{
    public function __construct($con = 'mysql:host=localhost;dbname=arrayBD', $username = 'root', $password = '', $options = [])
    {
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_replace($default_options, $options);
        parent::__construct($con, $username, $password, $options);
    }
    public function run($sql, $args = NULL)
    {
        if (!$args) {
            return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

}