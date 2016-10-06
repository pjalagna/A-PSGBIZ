<?php
// file adminIn.php
// process file for storage of html / php files into a database
// posted usr== user name
//        sid == session id
//        fn == filename of saved file (must include type)
//        fnc == file contents preserved via tx.js function
// main
// includes
include_once '../plib/ixxMS.PHP';
include_once '../ulib/dbc.PHP';
include "../plib/Redirect.php";
// unpack
include_once '../plib/unpack.php';
// convert cfn remove 0a
$str = getPAPX('cfn',$Pa,$Px);
$pos = strpos($str,"^0A");
while (0<$pos)
{
   $str = str_replace("^0A","^RL",$str); // convert to non hex token
   $pos = strpos($str,"^0A");
}
// open db
$dbh = openDB($dbna, $una , $pwd ) or die('db open fail'); // MySQL open
// write TCVR t='dbhold' r=<- genix()
$t = 'dbhold';
$r = getIX($dbh);
$c = 'user'; $v=getPAPX('user',$Pa,$Px); writeTCVR( $dbh, $t , $c , $v , $r );
$c = 'sid'; $v=getPAPX('sid',$Pa,$Px); writeTCVR( $dbh,  $t , $c , $v , $r );
$c = 'fn'; $v=getPAPX('fn',$Pa,$Px);   writeTCVR( $dbh,  $t , $c , $v , $r );
$c = 'cfn'; $v=$str; writeTCVR( $dbh, $t , $c , $v , $r );
// close db
closeDB($dbh);
// show fnc 
print(  '<br/> ' . getPAPX('fn',$Pa,$Px) . " is done " . getPAPX('cfn',$Pa,$Px) );   
?>
