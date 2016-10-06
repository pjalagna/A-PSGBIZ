<?php
// file ERROR.php
//
// -- fn error calls errorRead.php and goes to url(back) w/o sid
//
function ERROR($msg,$back)
{
include_once '../plib/ufuse.php';
fuse('errRead');
EGOTO($msg,$back);
exit;
} 
?>
