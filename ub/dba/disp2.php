<?php
// file disp2.php
// g: name
// grab contents from db by (name)
// includes
include_once '../plib/ufuse.php';
include_once '../plib/unpack.php';
$dis = fuse(getPAPX('name',$Pa,$Px));
// display
print($dis);
?>
