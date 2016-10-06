<?php
// file mvcSwitch.php
include_once '../plib/llogg.php';
// unpack
include_once '../plib/unpack.php';
include_once '../plib/ufuse.php';
print(fuse('pack1',' '));
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
} else { // logged on
    if (getPAPX('mvcStatus',$Pa,$Px) == '') // switch on mvcStatus
    {
        //-// not set display page
        include_once '../plib/ufuse.php'; // dbh is global
        $j = fill("master11",' '); 
        print($j);
        $fixx = FixI('footer','INPmvcStatus', ' '); // add submitt for test
        print($fixx);
        print('</body></html>');
    } else { 
        //-// set do redirect viz mvcStatus
        include_once '../plib/Redirect.php';
        // set to <- mvcStatus
        list($Pa,$Px) = writePAPX('to',getPAPX('mvcStatus',$Pa,$Px),$Pa,$Px);
        // do
        stick($Pa,$Px); // test w/ stick prod stickNgo
        //doGoto($Pa,$Px); // test remove // to execute
        print("done");
        exit;
    } // endif mvcStatus
} // endif logon

?>
