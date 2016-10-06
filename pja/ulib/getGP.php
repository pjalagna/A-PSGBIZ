<?php
// file getGP
// fn fuse(name)

function SFgetGP($dbh, $user)
{
  include_once '../plib/llogg.php';
  include_once '../plib/tcvrDAO.php';
  // use stored  function (here) to get user group
  $q1 = seekTCVR($dbh,'memberGP','user',$user,''); // [r]
  logg('q1=(' . $q1[0][0] . ")");
  $q2 = seekTCVR($dbh,'memberGP','GP','',$q1[0][0]);
  $ans = $q2[0][0];
  return($ans);
} // SFgetGP

?>

