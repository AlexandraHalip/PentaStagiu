<?php
include 'ConnectDB.php';
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                        <form method="POST" class="center">
                            <table class="table table-hover">
                                <tr>
                                    <td>Start</td>
                                    <td><input class="form-control"
                                               type="text"
                                               name="startPoint"
                                               placeholder="Enter Start"
                                               value="<?php if (isset($_POST['startPoint'])) echo $_POST['startPoint']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Finish</td>
                                    <td><input class="form-control"
                                               type="text"
                                               name="endPoint"
                                               placeholder="Enter Finish"
                                               value="<?php if (isset($_POST['endPoint'])) echo $_POST['endPoint']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Iterations</td>
                                    <td><input class="form-control"
                                               type="text"
                                               name="iterations"
                                               placeholder="Enter Iterations"
                                               value="<?php if (isset($_POST['iterations'])) echo $_POST['iterations']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Multiple</td>
                                    <td><input class="form-control"
                                               type="text"
                                               name="multiple"
                                               placeholder="Enter Multiple"
                                               value="<?php if (isset($_POST['multiple'])) echo $_POST['multiple']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary"
                                                                          name="submit" value="ADD"></td>
                                </tr>
                            </table>
                        </form>


                        <?php
                    if (isset($_POST["submit"])) {
                        $hostname = 'localhost';
                        $username = 'root';
                        $password = '';

                       $mypdo = new ConnectDB();
                        $data = $mypdo->run("INSERT INTO array (start, finish, iterations, m, succes, deleted) VALUES (?, ?, ? ,?, 1, 0)", [$_POST['startPoint'], $_POST['endPoint'], $_POST['iterations'], $_POST['multiple']])->fetchAll();
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Start</th>
                    <th>Finish</th>
                    <th>Iterations</th>
                    <th>Multiple</th>
                    <th>Succes</th>
                    <th>Data</th>
                    <th>Action <a class="btn btn-info" role="button" href="afisare.php">Refresh</a></tfoot></th>

                </tr>
                <tfoot>
                <tr><td colspan="6">
                        <a class="btn btn-dark" role="button" href="javascript:history.back()">Pagina anterioara</a></tfoot>

                </td>
                </tr>
                <?php
                $mypdo = new ConnectDB();
                $result = $mypdo->run('SELECT * FROM array ');
                foreach ($result as $row) {
                            if ($row['succes'] == 0) {
                                echo '<tr class="table-warning">';
                            } else
                                echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['start'] . '</td>';
                            echo '<td>' . $row['finish'] . '</td>';
                            echo '<td>' . $row['iterations'] . '</td>';
                            echo '<td>' . $row['m'] . '</td>';
                            echo '<td>' . $row['succes'] . '</td>';
                            echo '<td>' . $row['data'] . '</td>';
                            echo ' 
                                 <td><a href="editare.php?id=' . $row['id'] . '" type="button" class="btn btn-info">Edit</a>
    
                                     <a href="afisare.php?delete=' . $row['id'] . '" type="button" class="btn btn-danger">Delete</a>
                                     <a  href="afisare.php?id=' . $row['id'] . '" type="button" name="run" class="btn btn-primary">RUN</a></td>';
                            echo '</tr>';
                }
                ?>
            </table>
            <div class="clear"></div>
        </div>
    </div></div></body>
</html>
<?php
include 'Divizor.php';
if (isset($_GET['id']) ) {
    $mypdo = new ConnectDB();
    $row = $mypdo->run("SELECT * FROM array WHERE id=?", [$_GET['id']])->fetch(PDO::FETCH_ASSOC);
    $start=$row['start'];
    $finish=$row['finish'];
    $iterations=$row['iterations'];
    $m=$row['m'];
function functie($start, $iterations, $finish){
    $array=range($start+1,$finish-1);

    $array = array_slice($array,0,$iterations);
    return $array;
}
    $data= functie ($row['start'],$row['finish'],$row['iterations']);


$var1 = new Divizor();
echo "-> numerele divizibile cu 3 din vector".$var1->divizor($data, 3);
echo "<br/>";
echo "-> numarul de elemente divizibile cu 4 din vector".$var1->numarare($data, 4) . "<br/>";
echo "-> suma numerelor divizibile cu 5 din vector ".$var1->suma($data,5)."<br/>";


$var1 = new Divizor();
echo "-> numerele divizibile cu ".$m." din vector ".$var1->divizor($data, $m) . "<br/>";
echo "-> numarul numerele divizibile cu ".$m." din vector".$var1->numarare($data, $m) . "<br/>";
echo "-> suma numerelor divizibile cu ".$m." din vector ".$var1->suma($data,$m)."<br/>";

}

if (isset($_GET['delete']) ) {
    $mypdo = new ConnectDB();
    $row = $mypdo->run("SELECT * FROM array WHERE id=?", [$_GET['delete']])->fetch(PDO::FETCH_ASSOC);

// Stergere randuri in functie de campul "categorie"
//    $sql->run("DELETE FROM array WHERE id=?", [$_GET['delete']]);
//    $sql = "DELETE FROM array WHERE id IN" [$_GET['delete']];
    $del = $mypdo->run("DELETE FROM array WHERE id=?", [$_GET['delete']])->fetch(PDO::FETCH_ASSOC);

    if ($del == false && isset($_GET['delete'])) {
        header("location:afisare.php?msg=Record Delete Successfully");
    }
}
?>

