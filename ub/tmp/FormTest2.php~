<?php
// file form test 2
// 
// prove ??
// flow
// unpack to,SID,back
// verify SID
// 

include_once '../plib/ufuse.php';
include_once '../plib/unpack.php';
print(fuse('pack10','\n')); //<----  logg imxx, dbc includes sets dbh
print(fuse('vsid','\n'));
// test to see if dbh is valid == var_dump($dbh) == yes
// safety
// get SID
$SID = getPAPX('SID',$Pa,$Px);
// validate SID-DT
$d2 = seekTCVR($dbh,'sticky','SID-DT','',$SID);
$d22 = $d2[0][0];
// if (vSID($d22) != 'ok')
if (0 != 0)
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
$q1 = seekTCVR($dbh,'sticky','page','',$SID);
logg('q100=(' . $q1[0][0] . ")" );
$page = $q1[0][0];
//$page = getPAPX('page',$Pa,$Px); // test
logg('page=(' . $page . ")" );
// load form -- buttons will change mvcStatus
$j = fill("master11",' '); // head thru body not </body>
print($j);
$fixx = FixI('wkarea',$page, ' '); // ok - no change in page title
print($fixx);
print('</body></html>');

// stickNgo
} // if sid
?>
