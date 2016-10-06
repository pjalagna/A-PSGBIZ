<?PHP
// file SQSQ.php
// //////////////////////////////////////////////////////////////
// pja 11-17-2014 cloned from ixxMS original
// -- assume ixxMS has been included
// //////////////////////////////////////////////////////////////
function SQin($ins) {
    // returns string with ' ; % / replaced by ch 3 4 5 6
    $v1 = str_replace("'" , chr(3) , $ins);
    $v2 = str_replace(";" , chr(4) , $v1);
    $v3 = str_replace("%" , chr(5) , $v2);
    $v4 = str_replace("/" , chr(6) , $v3);
    return($v4);
    }
function SQout($ins) {
    // returns string with ch 3 4 5 6 replaced by  ' ; % /  
    $v1 = str_replace(chr(3), "'" , $ins);
    $v2 = str_replace(chr(4), ";" ,  $v1);
    $v3 = str_replace(chr(5), "%" , $v2);
    $v4 = str_replace(chr(6), "/" , $v3);
    return($v4);
    }
?>