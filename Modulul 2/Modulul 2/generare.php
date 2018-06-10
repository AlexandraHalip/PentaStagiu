<?php
/**
 * Created by PhpStorm.
 * User: Alexandra Halip
 * Date: 22.05.2018
 * Time: 18:14
 */
include 'Divizor.php';
class Generare
{
    public $startPoint;
    public $endPoint;
    public $iterations;
    public $multiple;
    public function __construct($_var)
    {
        $this->setStartPoint($_var['startPoint']);
        $this->setEndPoint($_var['endPoint']);
        $this->setIterations($_var['iterations']);
        $this->setMultiple($_var['multiple']);
    }
    /**
     * @param mixed $startPoint
     */
    public function setStartPoint($startPoint)
    {
        $this->startPoint = $startPoint;
    }
    /**
     * @param mixed $endPoint
     */
    public function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;
    }

    /**
     * @param mixed $iterations
     */
    public function setIterations($iterations)
    {
        $this->iterations = $iterations;
    }

    /**
     * @param mixed $multiple
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
    }

    /**
     * @return mixed
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    public function getStartPoint()
    {
        return $this->startPoint;
    }
    public function getEndPoint()
    {
        return $this->endPoint;
    }
    public function getIterations()
    {
        return $this->iterations;
    }
    public function generare()
    {
        $array = range($this->getStartPoint() + 1, $this->getEndPoint() - 1);
        echo "<pre>";
        return array_slice($array, 0, $this->getIterations());
    }

    public function rezolvare()
    {
        $array = $this->generare();
        $vec1=new Divizor();
        echo "-> numerele divizibile cu 3 din vector".$vec1 ->divizor($array, 3);
        echo "<br/>";
        echo "-> numarul de elemente divizibile cu 4 din vector".$vec1->numarare($array, 4) . "<br/>";
        echo "-> suma numerelor divizibile cu 5 din vector ".$vec1->suma($array,5)."<br/>";
    }


    public function rezolvare2()
{
    $array =$this->generare();
    $var1 = new Divizor();
    echo "-> numerele divizibile cu ".$this->getMultiple()." din vector ".$var1->divizor($array, $this->getMultiple()) . "<br/>";
    echo "-> numarul numerele divizibile cu ".$this->getMultiple()." din vector".$var1->numarare($array, $this->getMultiple()) . "<br/>";
    echo "-> suma numerelor divizibile cu ".$this->getMultiple()." din vector ".$var1->suma($array, $this->getMultiple())."<br/>";

}
}
