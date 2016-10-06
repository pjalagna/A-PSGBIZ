<?php
// file verifyGp
// fn fuse(name)
//
// ---------------------------------------------------------------------------------//
// date       // Author      // comment                                             //
// 09-26-2016 // Paul Alagna // original                                            //
// ---------------------------------------------------------------------------------//
//

function vGP($pgGp,$uid)
{
  include_once '../plib/ufuse.php';
  fuse('log');
  fuse('dbGet');
  $dbh = getDbh();
  // does user have a gp setting that matches
  $sq = "select MID from FACT where usrGpMid = '$uid' and usrGpGp = '$pgGp';";
  $ans = readDB($dbh,$sq);
  if (count($ans) != 0)
  {
    return('ok');
  } else {
    return('nok');
  }
} // vGP

?>

