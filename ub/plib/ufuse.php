<?php
// file ufuse Utility File Use
// fn fuse(name)
include_once 'dbget.php'; // dbh is global
function fuse($name,$option)
{
  include_once '../plib/llogg.php';
  logg('<br/>fusing ' . $name );
  $dbh = getDbh();
  $ans = dbgetdb($dbh , $name,$option);
  return(eval($ans));
} // fuse    

function fill($name,$option)
{
  include_once '../plib/llogg.php';
  logg('<br/>filling ' . $name );
  $dbh = getDbh();
  $ans = dbgetdb($dbh , $name,$option);
  return($ans);
} // fill == text returns 
 

function FixI($element,$Store,$option)
{
include_once '../plib/llogg.php';
  logg('<br/>fixing-i ' . $element . ' with ' . $Store );
$dc = fill($Store,$option);
$fixx = <<< TF
<!-- proto fix(element,SP name) -- fills from db -->
<script>
document.getElementById('$element').innerHTML = "$dc";
</script>
<body></html>
TF
; 
return($fixx);
} // fn FixI
function FixV($element,$Store,$option)
{
include_once '../plib/llogg.php';
  logg('<br/>fixing-v ' . $element . ' with ' . $Store );
$dc = fill($Store,$option);
$fixx = <<< TF
<!-- proto fix(element,SP name) -- fills from db -->
<script>
document.getElementById('$element').value = "$dc";
</script>
TF
; 
return($fixx);
} // fn fixV

 
?>

