<?PHP
include_once '../plib/unpack.php';
$ans = getPAPX('ans',$Pa,$Px);
$T = getPAPX('T',$Pa,$Px);
$C = getPAPX('C',$Pa,$Px);
$V = getPAPX('V',$Pa,$Px);
$R = getPAPX('R',$Pa,$Px);
$disp = <<< TV
<html>
    <head> <title> TCVR </title> </head>
    <body>
    <form name='f1' id='f1' method='POST' action='TCVR2.PHP'>
response <textarea name='ans' id="ans" cols='20' rows='5' >$ans</textarea><br/><br/>
       T <textarea name='T' id="T" cols='20' rows='5' >$T</textarea> 
      C <textarea name='C' id="C" cols='20' rows='5' >$C</textarea> 
       V <textarea name='V' id="V" cols='20' rows='5' >$V</textarea> 
        R <textarea name='R' id="R" cols='20' rows='5' >$R</textarea> <br />
       <input type="submit" name='cmd' value="read"  />
       <input type="submit" name='cmd' value="Write"  />
       ......<input type="submit" name='cmd' value="Delete"  />
......<input type="submit" name='cmd' value="genID"  />
    </form>
        <div name='sho' id='sho'> </div>
    </body>
</html>
TV
;
print($disp);
?>
