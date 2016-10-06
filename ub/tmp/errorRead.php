<?php
// file errorRead.php
// unpacks and displays message
// on submit uses "back" to redirect
// includes

// unpack
include_once '../plib/unpack.php';
$msg = getPAPX('msg',$Pa,$Px);
$back = getPAPX('back',$Pa,$Px);
$dx = <<< EM
<html>
  <head> <title> error page </title> </head>
  <body>
    <h1> Error: <br /> (( $msg  )) </h1>
    <form action='$back' method='POST'>
      <input type='submit' value='press when done reading'/>
    </form>
  </body>
</html>
EM
;
print($dx);
?>
