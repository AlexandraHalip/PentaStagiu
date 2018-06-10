<?php
//$start=$_POST['startPoint'];
//$finish=$_POST['endPoint'];
//$it=$_POST['iterations'];
//$m=$_POST['multiple'];

class Validare extends Exception{


    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
try{
    if( empty($_POST['startPoint']) || empty($_POST['endPoint'])|| empty($_POST['iterations'])){

        throw new Validare('Completeaza toate campurile!! :)');
    }
    if(is_numeric($_POST['startPoint']) && is_numeric($_POST['endPoint']) && is_numeric($_POST['iterations'])){}
    else{
        throw new Validare('Completeaza campurile cu valori numerice!! :)');
    }
    if(($_POST['endPoint'])-($_POST['startPoint']) <= ($_POST['iterations'])){
        throw new Validare('Alege un numar mai mic de elemente!! :)');
    }
    if( empty($_POST['multiple'])){
        throw new Validare('Completeaza campul numar multiplu!! :)');
    }
    if(is_numeric($_POST['multiple'])){}
    else{
        throw new Validare('Completeaza campul cu valori numerice!! :)');
    }
}
catch(Validare $exception){
    echo $exception->getMessage();
    exit;

}


?>