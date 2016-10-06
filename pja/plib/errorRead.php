<?php
// file errorRead.php ({error}, back)
//
//-- display message on submit goto url(back)
//
print('<h1> ' . $_GET['error'] . ' </h1>');
$g = $_GET['back'];
$x = <<< DD
<h2> 
<form method="GET" action="$g" >
          <input type="submit" value="Ready" />
     </form>
</h2>
DD
;
print($x);
?>
