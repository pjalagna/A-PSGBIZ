<?php
// file verifySID
//
// fn vSID(SID)

function vSID($dd)
{
  include_once '../plib/ufuse.php';
  fuse('log', ' ');
  // l2 verify sid against today
  // returns ok/nok
  $d1 = getdate();
  $d1d = $d1['wday'];
  logg('d1d=(' . $d1d . ")");
  // get sid-dt
  include_once '../plib/stickyDAO.php'; // fuse('sticky')
  // read getSticky(sid,'sid-dt')
  $dddt = getSticky($dd,'SID-DT');
  logg('  dddt=(' . $dddt . ")");
  if ( $d1d == $dddt )
  {
    $ans = 'ok';  
  } else {
    $ans = 'nok';
    // do garbage collection on sticky ID
    // TBD
  } // if
  return($ans);
} // vSID

?>

