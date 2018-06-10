<?php
// Datele de conectare (adresa_server, baza_de_date, nume si parola)
$hostdb = 'localhost';
$namedb = 'teste';
$userdb = 'username';
$passdb = 'password';

try {
    // Conectare si creare obiect PDO
    $dbh = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
    $dbh->exec("SET CHARACTER SET utf8");      // Setare encoding caractere UTF-8

    // Stergere randuri in functie de campul "categorie"
    $sql = "DELETE FROM `sites` WHERE `categorie` IN('educatie', 'programare')";
    $count = $dbh->exec($sql);

    $dbh = null;        // Deconectare
}
catch(PDOException $e) {
    echo $e->getMessage();
}

// Daca interogarea e facuta cu succes ($count diferit de false)
if($count !== false) echo 'Randuri afectate: '. $count;       // Afiseaza nr. randuri afectate
?>