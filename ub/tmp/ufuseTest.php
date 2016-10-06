<?php
// file ufuse Utility File Use
// works
// fn fuse(name)
include_once '../plib/ufuse.php'; // dbh is global
include_once '../plib/llogg.php';
$j = fuse("unpackNdump",'\n');
print($j);
$dx = fill('justOneLine','\n');
list($Pa,$Px) = writePAPX('dd',$dx,$Pa,$Px);
dumpPAPX($Pa,$Px);
$trix = <<< SD
<html> <head> </head>
<body>
<table border='3'>
<tr><td>
<div name='b1v' id='b1v'>  </div>
<input name='in1' id='in1'> junk </input> 
</td></tr></table>
SD
;
print($trix);
$fixx = FixI('b1v','tab1','\n');
// $fixx = FixI('b1v','tt1',''); // no - either option
// $fixx = FixI('b1v','masterBody','\n'); // no - either option
// $fixx = FixI('b1v','justOneLine','\n'); // works either option
print($fixx);
print('</body></html>');
?>

