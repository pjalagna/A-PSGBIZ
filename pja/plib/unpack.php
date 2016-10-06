<?PHP
//  file unpack.php
// pja 04-15-2016 testing
// pja 12-14-2014 blanked echo's for production
// pja 12-08-2014 added getPAPX, writePAPX
// exact of phpi
global $Pa,$Px;
$Pa = array();
$Px = array();
// write a null record first (o index failure)
$ret = writePAPX('NULL','NULL',$Pa,$Px);
$Pa = $ret[0];
$Px = $ret[1];

foreach ($_REQUEST as $k => $v) {
         $ret = writePAPX($k,$v,$Pa,$Px);
         $Pa = $ret[0];
         $Px = $ret[1];
}
function getPAPX($name,$Pa,$Px)
{
    include_once 'llogg.php';
    try { 
        if (empty($Pa[$name]) == true) {
            $ans = '';
        } else {   
            $ans = $Px[$Pa[$name]][1];
        }
    } catch (Exception $e) {
        $ans = '';
    }
    logg ('<br/>getPAPXL=(' . $name . ')- ' . $ans );
    return($ans);
}
function writePAPX($name,$value,$Pa,$Px)
{
    include_once 'llogg.php';
    // returns to caller PaPx
    $j = count($Px);
    $Pa[$name] = $j;
    $Px[$j]= array();
    $Px[$j][0] = $name;
    $Px[$j][1] = $value;
    logg('<br /> writePAPXL name (' . $name . ') has (' . $value . ') '); // test
    logg ('<br /> verify read (' . getPAPX($name,$Pa,$Px) . ') ?');  // test
    return array($Pa,$Px);
}
function dumpPAPX($Pa,$Px)
{
    print("<br/>dump Pa<br/>");
    print_r($Pa);
    print("<br/> dump Px<br/>");
    print_r($Px);
    print("<br/> end dump PaPx<br/>");
} // end dump
// end unpack
?>
