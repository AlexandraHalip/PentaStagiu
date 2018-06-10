<?php
$start=$_POST['startPoint'];
$finish=$_POST['endPoint'];
$it=$_POST['iterations'];
$m=$_POST['multiple'];
class Validare extends Exception{
    public function eroare(){
        return "Completeaza toate campurile!!";
    }
    public function eroare1(){
        return "Completeaza campurile cu valori numerice!! :)";
    }
    public function eroare2(){
        return "Alege un numar mai mic de elemente!!";
    }
    public function eroare3(){
        return "Completeaza campul numar multiplu!!";
    }
    public function eroare4(){
        return "Completeaza campul cu valori numerice!! :)";
    }
}
try{
    if( empty($_POST['startPoint']) || empty($_POST['endPoint'])|| empty($_POST['iterations'])){

        throw new Validare();
    }
}
catch(Validare $exception){
    echo $exception->eroare();
    exit;
}
try{
    if(is_numeric($_POST['startPoint']) && is_numeric($_POST['endPoint']) && is_numeric($_POST['iterations'])){}
    else{
        throw new Validare();
    }
}
catch (Validare $exception){
    echo $exception->eroare1();
    exit;
}
try{
    if(($_POST['endPoint'])-($_POST['startPoint']) <= ($_POST['iterations'])){
        throw new Validare();
    }
}
catch (Validare $exception) {
    echo $exception->eroare2();
    exit;
}

try{
    if( empty($_POST['multiple'])){
        throw new Validare();
    }
}
catch (Validare $exception) {
    echo $exception->eroare3();
  exit;
}


try{
    if(is_numeric($_POST['multiple'])){}
    else{
        throw new Validare();
    }
}
catch (Validare $exception){
    echo $exception->eroare4();
    exit;
}
 ?>