<?php
// file MondayForm
// unpack
// proc gate MID is NOT set
if (isset($_GET['MID']) != true )
{
  // sid gate SID not sent and SID not valid
  if (0==0)
  {
    // group gate
    if (0==0)
    {
      // show form
      include_once 'MondayAttendance.php';
      print(Monday());
    } else { // group gate
      // error 'Auth error log in' --> errorRead ; login
    } // group gate
  } else { // sid gate
    // error 'log in' --> errorRead ; login
  } // sid gate
} else { // proc gate
  print('<br /> here ---------------------------');
  print('<br /> MID is (' . $_GET['MID'] . ")");
  // store form
  // goto --> formMenu
} // proc gate
