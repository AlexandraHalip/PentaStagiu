
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stagiu</title>
        <link rel="stylesheet" type="text/css" href="public/reset.css"/>
        <link rel="stylesheet" type="text/css" href="public/style.css"/>
    </head>
    <body>
    <div class="wrapper">
        <div class="line center bold">
            <h1>PHPentaStagiu 2018</h1>
                <h2>M02.01 OOP</h2>
            </div>
            <div class="line">
            <ol class="ml20">
                <li>Generati un array de numere
                        <ul>
                        <li>cuprins intre <span class="bold">Numar de pornire</span> si <span class="bold">Numar de sfarsit</span> excluzand cele doua numere</li>
                            <li>numarul maxim de elemente este <span class="bold">Numar de elemente</span></li>
                        </ul>
                    </li>
                    <li>Afisati toate numerele multiplu de 3</li>
                    <li>Numar de numere multiplu de 4</li>
                    <li>Suma numerelor multiplu de 5</li>
                </ol>
            </div>
            <div class="line">
            <form method="POST" class="center">
                <p class="label">Numar de pornire</p>
                    <input type="text" name="startPoint"/>

                    <p class="label">Numar de sfarsit</p>
                    <input type="text" name="endPoint"/>

                    <p class="label">Numar de elemente</p>
                    <input type="text" name="iterations"/>

                     <p class="label">Numar multiplu </p>
                    <input type="text" name="multiple"/>

                    <br/><br/>
                    <input type="submit"/>
                </form>
            </div>

            <div class="clear"></div>
        </div>
    </body>
</html>

<?php

include 'Divizor.php';
include 'Validare.php';
if (!$_POST) {
    exit;
}


echo "<pre>";
print_r($_POST);

$start=$_POST['startPoint'];
$finish=$_POST['endPoint'];
$it=$_POST['iterations'];
$m=$_POST['multiple'];
$data= functie ($_POST['startPoint'],$_POST['endPoint'],$_POST['iterations']);

// generare array
function functie($start, $it, $finish){
    $array=range($start+1,$finish-1);

    $array = array_slice($array,0,$it);
    return $array;
}

var_dump($data);
$var1 = new Divizor();
echo "-> numerele divizibile cu 3 din vector".$var1->divizor($data, 3);
echo "<br/>";
echo "-> numarul de elemente divizibile cu 4 din vector".$var1->numarare($data, 4) . "<br/>";
echo "-> suma numerelor divizibile cu 5 din vector ".$var1->suma($data,5)."<br/>";

var_dump($data);
$var1 = new Divizor();
echo "-> numerele divizibile cu ".$m." din vector ".$var1->divizor($data, $m) . "<br/>";
echo "-> numarul numerele divizibile cu ".$m." din vector".$var1->numarare($data, $m) . "<br/>";
echo "-> suma numerelor divizibile cu ".$m." din vector ".$var1->suma($data,$m)."<br/>";
?>