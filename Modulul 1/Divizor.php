<?php
/**
 * Created by PhpStorm.
 * User: Alexandra Halip
 * Date: 08.05.2018
 * Time: 18:57
 */

class Divizor
{
    public function __construct()
    {
        echo "Rezultate operatiuni: <br/>";
    }
    public function divizor($data, $m)
    {
        foreach ($data as $value) {
            if ($value % $m == 0) {
                echo $value.", ";
            }

        }
    }
    public function numarare($data, $m) {
        $nr=0;
        foreach ($data as $value) {
            if ($value % $m == 0) {
                $nr++;
            }
        }echo $nr;
    }
    public function suma($data, $m) {
        $sum=0;
        foreach ($data as $value) {
            if ($value % $m == 0) {
                $sum+=$value;
            }
        }echo $sum;
    }
}
?>