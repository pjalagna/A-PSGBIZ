<?php
// file dbget.php
// fn dbgetdb(name, dbHandle) ** dbh is global after include
// grab contents from db by (name)
 // includes
  include_once '../plib/ixxMS.PHP';
  include_once '../ulib/dbc.PHP';
  include_once '../plib/untxp.php';
  // open db
  global $dbh;
  $dbh = openDB($dbna, $una , $pwd ) or die('db open fail'); // MySQL open
function getDbh()
{
   global $dbh;
   return($dbh);
} // get dbh

function dbgetdb($dbh,$name,$option)
{
  // read tcv->r
  $t = 'dbhold'; $c = 'fn'; $v=$name;
  $rx1 = seekTCVR($dbh, $t,$c,$v,'');
  // read t=dbhold c=cfn r=rx
  $t = 'dbhold'; $r = $rx1[0][0];
  $c = 'cfn'; $v='';
  $rs = seekTCVR($dbh, $t,$c,$v,$r);
  closeDB($dbh);
  // convert via untx
  $ans = untx($rs[0][0],$option);
  return($ans);
}
?>
