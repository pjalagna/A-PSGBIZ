<?php
// file proc2.php login1 elsewise
           include_once '../plib/unpack.php';
           include_once '../plib/ufuse.php';
           $mvcStatus = '';
           $mvcStatus = getPAPX('mvcStatus',$Pa,$Px);
           $to = '';
           $to = getPAPX('to',$Pa,$Px);
           $ccc = 0;
           if (empty($mvcStatus) != true) { $ccc = 1; }
           if ($mvcStatus == $to) { $ccc = 1; }
           if ($ccc == 1) {
               include_once '../plib/ixxMS.PHP';
               include_once '../ulib/dbc.PHP';
               $dbh = openDB($dbna, $una, $pwd);
               $disp = fuse($to);
               echo($disp);
            } else { // mvc name given
                $ret = writePAPX('to','login1' ,$Pa,$Px);
                $Pa = $ret[0];
                $Px = $ret[1];
                include "../plib/Redirect.php";
                stickNgo($Pa,$Px);
                exit;
            } // endif
?>
