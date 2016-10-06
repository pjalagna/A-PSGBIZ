<?php
// file redirect.php via ['to']
////////////////////////////////////////////////////////////////////////
// pja 12-14-2014 reviewed echo for production
// pja 12-10-2014 blanked mvcStatus on exit
// pja 12-10-2014 edits converted all echos to <<< template forms (no embedded calls)
// pja 11-23-2014 original
////////////////////////////////////////////////////////////////////////
// builds a form with hidden fields from the $Pa, $Px
// and calls document.forms[na].submit to execute redirection
////////////////////////////////////////////////////////////////////////
function EGOTO($msg,$back)
{
   if ($msg != '') 
   {
     $wmsg = '?error=' . $msg;
   } else {
     $wmsg = '';
   } // msg
   $e1 = <<< e1m
<html>
    <head>
       <title> redirect </title>
    </head>
     <body onload="document.forms['fr'].submit()" >
        <form id='fr' name='fr' method='GET' action="../plib/errorRead.php$wmsg" >  <br />
              <br /> <input type='text' name='error' id='msg' value='$msg' />
              <br /> <input type='text' name='back' id='back' value='$back' />
e1m
; // test w GET shld be POST
echo($e1); // good echo 
echo (" </form> <br /> </body> <br /> </html> "); // good echo
} // EGOTO

function doGoto($Pa,$Px)
{
   // limited post sender
   // sends SID, to, back, and msg
   include_once "SQSQ.php";
   $to = getPAPX('to',$Pa,$Px);
if ($to == '')
{
} else {
   $msg = getPAPX('msg',$Pa,$Px);
   $SID = getPAPX('SID',$Pa,$Px);
   $back = getPAPX('back',$Pa,$Px);
   if ($msg != '') 
   {
     $wmsg = '?error=' . $msg;
   } else {
     $wmsg = '';
   } // msg
   $e1 = <<< e1m
<html>
    <head>
       <title> redirect </title>
    </head>
     <body onload="document.forms['fr'].submit()" >
        <form id='fr' name='fr' method='POST' action="$to$wmsg" >  <br />
              <br /> <input type='text' name='SID' id='SID' value='$SID' />
              <br /> <input type='text' name='msg' id='msg' value='$msg' />
              <br /> <input type='text' name='back' id='back' value='$back' />
              <br /> <input type='text' name='to' id='to' value='$to' />
e1m
; // test w GET shld be POST
echo($e1); // good echo 
echo (" </form> <br /> </body> <br /> </html> "); // good echo
} // endif to = ''
} // do goto

function doRe($Pa,$Px)
{
include_once "SQSQ.php";
$to = getPAPX('to',$Pa,$Px);
if ($to == '')
{
} else {
    $ret = writePAPX('mvcStatus','',$Pa,$Px);
    $Pa = $ret[0];
    $Px = $ret[1];
    $e1 = <<< e1m
<html>
    <head>
       <title> redirect </title>
    </head>
     <body onload="document.forms['fr'].submit()" >
        <form id='fr' name='fr' method='POST' action="$to" >  <br />
e1m
; // test w GET shld be POST
    echo($e1); // good echo 
    foreach ( array_keys($Pa) as $i )
    {
       $na = SQin($Px[$Pa[$i]][0]);
       $val = SQin($Px[$Pa[$i]][1]);
       $stmt = <<< estmt
<br /> <input type='text' name='$na' id='$na' value='$val' />
estmt
;
       echo($stmt); // good echo
    } // foreach
    echo (" </form> <br /> </body> <br /> </html> "); // good echo
    exit;
} // endif to=''
} // end doRe

function stickNgo($dbh,$Pa,$Px)
{
  // stores all parameters to sticky db under sid
$T = 'sticky';
$R = getPAPX('SID',$Pa,$Px);
foreach ( array_keys($Pa) as $i )
{ 
$C = SQin($Px[$Pa[$i]][0]);
$V = SQin($Px[$Pa[$i]][1]);
writeTCVR( $dbh,  $T , $C , $V , $R );
} // foreach
// get gp
// goto 
$gp = getPAPX('gp',$Pa,$Px);
list($Pa,$Px) = writePAPX('to','Proc.php',$Pa,$Px);
doGoto($Pa,$Px);
exit;
}
function stick($dbh, $Pa, $Px)
{
  include_once 'llogg.php';
  // stores all parameters to sticky db under sid

//include_once '../plib/ixxMS.PHP';
//include_once '../ulib/dbc.PHP';
include_once "../plib/SQSQ.php";
// open db

// $dbh = openDB($dbna, $una , $pwd ) or die('db open fail'); // MySQL open
$T = 'sticky';
$R = getPAPX('SID',$Pa,$Px);
logg("<br/>TR = (" . $T . ")(" . $R . ")");
foreach ( array_keys($Pa) as $i )
{ 
$uu = getPAPX($i, $Pa ,$Px);
logg("<br/> bark=(" . $i . ")-(". $uu . ")" );
//$C = SQin($Px[$Pa[$i]][0]);
//$V = SQin($Px[$Pa[$i]][1]);
$C = $i;
$V = getPAPX($i,$Pa,$Px);
logg("<br/>TCVR = (" . $T . ")(" . $C . ")(" . $V . ")(" . $R . ")");
writeTCVR( $dbh,  $T , $C , $V , $R );
} // foreach
closeDB($dbh);
} // stick
?>
            
