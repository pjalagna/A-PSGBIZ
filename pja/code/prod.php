<?php
/* 
what works
- in php section
-- can i fuse an include statment that points to a physical php file YES
-- can i fuse php code
-- can i fill php code
-- can i fill a var with html code
-- can i fill a var with js code
*/
// includes
include_once "../plib/unpack.php";
include_once "../plib/llogg.php";
include_once "../plib/ufuse.php";
//-- can i fuse an include statment that points to a physical php file
// ie include_once "pgoof.php";
fuse("igoof",'\n'); // adds function goof returns "here" + inp
// use function
$v = "mine";
$v1 = goof($v);
print($v1);
//-- YES

?>
