<?php
// file listdb
// 


function listdb($dbh, $element, $sf)
{
  include_once '../plib/llogg.php';
  $lx = seekTCVR($dbh,'lov',$sf,'',''); // [v] // in production use get<SF>
  logg('lx count=(' . count($lx) . ")" );
  $out = '<select name=' . $element . ">";
  foreach ($lx as $ii)
  { 
    $oo = seekTCVR($dbh,'lov',$sf,'',$ii[0]) ;
    $out .= "<br /><option> " . $oo[0][0] . "</option>";
  } // for ii
  $out .= "<br /></select>";
  return($out);
} // listdb

?>

