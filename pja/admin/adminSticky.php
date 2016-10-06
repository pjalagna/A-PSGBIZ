<?php
// file adminSticky.php
//
// -- C creates sticky table
// -- R reads (SID,item)
// -- P puts (SID,item,vval)
include_once '../plib/ufuse.php';
fuse('log',' ');
fuse('StickyDAO',' ');

if ($_GET['op'] == "C")
{
   logg('admin sticky create');
   genSticky();
   logg('admin sticky done');
} else if ($_GET['op'] == "R") {
    logg('admin sticky read');
    $r = getSticky($_GET['SID'],$_GET['item']);
    print('<br /> ' . $r);
} else if ($_GET['op'] == "P") {
    logg('admin sticky write');
    putSticky($_GET['SID'],$_GET['item'],$_GET['vval']);
} else {
include_once '../plib/ufuse.php';
fuse('stickyDAO');
fuse('log',' ');
logg('admin sticky create');
genSticky();
logg('admin sticky done');
} // iffs
