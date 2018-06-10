
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>CRUD</title>
    <link rel="stylesheet" href="" type="text/css" />
    <script type="text/javascript"></script>
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>CRUD <small>generare array</small></h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Introduceti date pentru generare array</div>
                <div class="panel-body">

                    <div class="wrapper">
                        <div class="line center bold">
                            <h1>PHPentaStagiu 2018</h1>
                            <h2>M02.02 OOP</h2>
                        </div>
                        <div class="line">
                            <ol class="ml20">
                                <li>Generati un array de numere

                                </li>
                                <li>Afisati toate numerele multiplu de 3</li>
                                <li>Numar de numere multiplu de 4</li>
                                <li>Suma numerelor multiplu de 5</li>
                            </ol>
                        </div>

    <div class="line">

            <form method="POST" class="center">
                <table class="table table-hover">
                    <tr>
                     <td><label>Numar de pornire</td>
                     <td>  <input class="form-control"
                       type="text"
                       name="startPoint"
                       placeholder="Enter Start"
                       value="<?php if (isset($_POST['startPoint'])) echo $_POST['startPoint']; ?>"/></label></td>
                    </tr>
                     <tr>
                     <td><label>Numar de sfarsit</td>
                    <td><input class="form-control"
                       type="text"
                       name="endPoint"
                       placeholder="Enter Finish"
                       value="<?php if (isset($_POST['endPoint'])) echo $_POST['endPoint']; ?>"/></label></td>
                </tr>
            <tr>
               <td><label>Numar de elemente</td>
                <td><input class="form-control"
                       type="text"
                       name="iterations"
                       placeholder="Enter Iterations"
                       value="<?php if (isset($_POST['iterations'])) echo $_POST['iterations']; ?>"/></label></td>
            </tr>
                <tr>
            <td><label>Numar divizor</td>
                    <td><input class="form-control"
                       type="text"
                       name="multiple"
                       placeholder="Enter Multiple"
                       value="<?php if (isset($_POST['multiple'])) echo $_POST['multiple']; ?>"/></label></td>
                </tr>
                <tr><td><input type="submit" value="Calculeaza" class="btn btn-dark"/></td>
                    <td>  <a href="afisare.php" >Tabel CRUD</a></td>
                </table>
        </form>
    </div>
<div class="clear"></div>
 <div class="clear"></div>
<?php
include 'ConnectDB.php';
include 'generare.php';
include 'Validare.php';
if (!$_POST)
exit;
$form = new Generare($_POST);
$form->rezolvare();
$form1 = new Generare($_POST);
$form1->rezolvare2();
$mypdo = new ConnectDB();
$data = $mypdo->run("INSERT INTO array (start, finish, iterations, m, succes, deleted) VALUES (?, ?, ? ,?, 1, 0)", [$_POST['startPoint'], $_POST['endPoint'], $_POST['iterations'], $_POST['multiple']])->fetchAll();
?>
</div>
</body>
</html>

