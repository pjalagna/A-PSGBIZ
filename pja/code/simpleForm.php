<?php
// file simpleForm
//
// ---------------------------------------------------------------------------------//
// date       // Author      // comment                                             //
// 09-26-2016 // Paul Alagna // removed MID gate                                    //
// 09-26-2016 // Paul Alagna // original                                            //
// ---------------------------------------------------------------------------------//
//
// unpack
include_once '../plib/ufuse.php';
fuse('error','');
// sid gate SID  sent and SID valid
if (isset($_GET['SID']) == true )
  {
  fuse('vSID','');
  if (vSID($_GET['SID']) != 'ok') { ERROR('Session error - please Log in','login'); exit; } 
  // group gate
  $me = fill('simpleFormGP',' ');
  include_once '../plib/stickyDAO.php'; // fuse
  $you = getSticky($_GET['SID'],'usr');
  fuse('vGP','');
  if (vGP($me,$you) == true) 
  {
  // show form
  include_once 'SimpleSubmit.php'; // fuse
  print(simpleSub());
  } else { // group gate
    ERROR('Auth error - please Log in','login'); exit; 
  } // group gate
} else { // sid gate
    ERROR('Session error - please Log in','login'); exit;
} // sid gate
?>
