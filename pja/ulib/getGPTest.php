<?php
// file getGPTest
// fn fuse(name)
include_once '../plib/ufuse.php';
include_once '../plib/llogg.php';
include_once 'getGP.php';
$m = SFgetGP($dbh, 'Paul');
logg('m=(' . $m . ")");

?>

