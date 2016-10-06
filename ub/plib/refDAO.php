<?php
// file refDAO.php
// //////////////////////////////////////////////////////////////////////////////////////
// pja 12-14-2014 blanked echo for production
// pja 11-17-2014 cloned from ixxMS original
// Ref routines CreateRef, Add2Ref, readRef, deleteRef, dropRef
// -- assume ixxMS has been included (also includes tcvrDAO , refDAO.php<- this file
// //////////////////////////////////////////////////////////////////////////////////////

// Ref routines CreateRef, Add2Ref, readRef, deleteRef, dropRef
function readRef($dbh,$refName)
{
    $tag = 'V';
    $T = '-'; $R = '-'; $C='name';
    //     read($dbh, $name,    $tag, $T,$C,$V,$R)
    $ans = readTCVR($dbh, $refName, $tag, $T,$C,$V,$R);
    return($ans);
} // readRef

function Add2Ref($dbh,$refName,$vval)
{
    $T = '-'; $R = '-'; $C = 'name';
    $V = $vval;
    $ixx = getIX($dbh);
    //echo('<br /> ix ' . $ixx );
    $name = $refName;
    writeTCVR( $dbh, $name, $ixx , $T , $C , $V , $R );
} // Add2Ref

function createRef($dbh, $refName) 
{
  $cr = 'Create Table ' . $refName . '(IXX decimal(12) , T varchar(1000) ,  C varchar(1000), V varchar(1000), R varchar(1000) , primary key (IXX) ) ;';
  executeDB($dbh, $cr);
} // createRef

function dropRef($dbh, $refName)
{
  $cr = 'drop Table ' . $refName . ' ;' ;
  executeDB($dbh,$cr);
} // dropRef

/*
// test bed

*/


?>
