<?php
// file verifySID
// fn fuse(name)

function vSID($dd)
{
  include_once '../plib/llogg.php';
  // l2 verify sid against today
  // returns ok/nok
  $d1 = getdate();
  $d1d = $d1['wday'];
  logg('d1d=(' . $d1d . ")");
  logg('dd=(' . $dd . ")");
  if ( $d1d == $dd )
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

