<?php
// file PDODAO.PHP
///////////////////////////////////////////////////////
//
// pja 04-15-2016 added trace prints
// pja 12-14-2014 reviewed for echo blanking for production
// pja 11-17-2014 Original 
// connections using mysql api
// openDB, closeDB, executeDb, writeDB, readDB
//
// testDB
///////////////////////////////////////////////////////

function openDB($databaseName, $user, $pass) {
    // open database returns handle
    try{     
        $dbh = new PDO('mysql:host=127.0.0.1;dbname='.$databaseName.';charset=utf8', $user , $pass );
	}catch (PDOException $e){
            die ('DB Error' . $e);
    } // end open database
    return($dbh);
      
}

function closeDB($dbh) {
    $dbh = null; // close db
}

function executeDB($dbh,$stmt)
{
    include_once 'llogg.php';
    $q1p = $dbh->prepare($stmt);
    logg ('<br/>executeDB=='. $stmt);
    $q1p->execute();
} //

function writeDB($dbh,$stmt)
{
    include_once 'llogg.php';
    logg('<br/>writeDB=='. $stmt);
    executeDB($dbh,$stmt);
} //

function readDB($dbh,$stmt)
{
    include_once 'llogg.php';
    logg('<br/>readDB=='. $stmt);
    $sq = $dbh->query($stmt);  // exe
    $sm2 = $sq->fetchAll();
    return($sm2); // return set w/o conversion
} //

/*
// test bed

*/


?>
