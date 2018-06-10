<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>CRUD</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript"></script>
<?php

include 'ConnectDB.php';
include 'CRUD/edit.php';
include 'generare.php';
$mypdo = new ConnectDB();
if (isset($_GET['id']) && !empty($_GET['id'])) {

   $op = new edit($mypdo);
    $row = $mypdo->run("SELECT * FROM array WHERE id=?", [$_GET['id']])->fetch(PDO::FETCH_ASSOC);
    ?>

        <form method="POST" class="center"
              action="editare.php?id=<?php echo $_GET['id']; ?>">
            <table class="table table-hover">
            <label>Numar de pornire<br>
                <input class="form-control mx-auto" type="text" name="startPoint"
                       value="<?php echo $row['start'] ?>"/></label>
            </br>
            <label>Numar de sfarsit<br>
                <input class="form-control mx-auto" type="text" name="endPoint"
                       value="<?php echo $row['finish']; ?>"/></label>
                </br>
            <label>Numar de elemente<br>
                <input class="form-control mx-auto" type="text" name="iterations"
                       value="<?php echo $row['iterations']; ?>"/></label>
                </br>
            <label>Numar divizibil <br>
                <input class="form-control mx-auto" type="text" name="multiple"
                       value="<?php echo $row['m']; ?>"/></label>
            </br>
            <input type="submit" name="submit" value="Actualizare" class="btn btn-primary"/>
            </table>
            <a class="btn btn-dark" role="button" href="javascript:history.back()">Renuntare</a>

        </form>
    </div>

    <div class="clear"></div>
    <?php
    if (!$_POST)
        exit;
 $form = new Generare($_POST);
     function edit($id, $start, $finish,$iterations, $multiple, $data, $success)
    {
        $this->data = $this->db->run("UPDATE arrayBD SET start=?, finish=?, iterations=?,m=?, data=?, success=? WHERE id=?", [$start, $finish, $iterations, $multiple, $data, $success, $id]);
    }

    if (isset($_POST['submit']))  {
            date_default_timezone_set('Europe/Bucharest');
            $data = date('Y-m-d H:i:s');
            $op->edit($_GET['id'], $_POST['startPoint'], $_POST['endPoint'], $_POST['iterations'], $_POST['multiple'], $data, 1);
        header("location:afisare.php?msg=Record Edit Successfully");


    }

}
?>
