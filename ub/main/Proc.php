<?php
// file Proc.php

// unpack
include_once '../plib/ufuse.php';
print(fuse('pack1'));
// safety
// get SID
$SID = getPAPX('SID',$Pa,$Px);
// validate SID-DT
$d2 = seekTCVR($dbh,'sticky','SID-DT','',$SID);
$d22 = $d2[0][0];
if (vSID($d22) != 'ok')
{
  // error process and exit to logon.html
    list($Pa,$Px) = writePAPX('msg','Please log on',$Pa,$Px);
    list($Pa,$Px) = writePAPX('back','login.html',$Pa,$Px);
    list($Pa,$Px) = writePAPX('to','errorRead.php',$Pa,$Px);
    include_once '../plib/Redirect.php';
    doGoto($Pa,$Px);
    exit;
} else {

// get sticky mvcStatus
$q1 = seekTCVR($dbh,'sticky','mvcStatus','',$SID);
logg('q100=(' . $q1[0][0] . ")" );
// load form -- buttons will change mvcStatus
//$frm = fuse($q1[0][0])
// stickNgo
} // if sid
?>
