<?php
function untx($in,$option)
{
  // reverses js function tx which converts non aA-zZ;0-9 to ascii AND replaces % with ^
  $out = "";
  $ix=-1;
  $ixm = strlen($in);
  // print("<br/> ixm(" . $ixm . ")" );
  while ($ix < $ixm-1) 
    {
    $ix++;
    //print("<br /> in[ix](" . $in[$ix] . ")");
      if ($in[$ix] == "^") 
      {
      $cc = $in[$ix+1] . $in[$ix+2];
      // trap for ^RL viz option
      if ($cc == "RL") 
      { 
        $acc = $option;
      } else {
        $acc = hex2bin($cc);
      } // RL trap
      $out = $out .  $acc;
      // print("<br/> -----------------------cc(" . $cc . ")" );
      $ix = $ix +2;
      } else {
        $out = $out .  $in[$ix];
      } // endif
    // print("<br/> -------------------------------------------------out(" . $out . ")" );
  } // wend
    return($out);
}// untx
?>
