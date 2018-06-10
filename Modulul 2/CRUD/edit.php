<?php
/**
 * Created by PhpStorm.
 * User: Alexandra Halip
 * Date: 22.05.2018
 * Time: 21:11
 */

class edit
{
    private $conn;
    private $array;
    public function __construct(ConnectDB $conn)
    {
        $this->conn = $conn;
    }
    public function edit($id, $start, $finish, $iterations, $multiple, $data)
    {
        $this->array = $this->conn->run("UPDATE array SET start=?, finish=?, iterations=?, m=?, data=? WHERE id=?", [$start, $finish, $iterations,$multiple, $data, $id]);
    }

}
//$obj=new  edit;
?>
