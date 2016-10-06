<?php
// file stickyDAO.php
//
// fn genSticky () creates table name
// fn getSticky(SID,item)
// fn putSticky(SID, item,value) // overwrites old value of item
//
include_once '../plib/ufuse.php';
include_once '../plib/dbget.php'; // dbh is global // fuse??

function genSticky()
{
  $dbh = getdbh();
  fuse('log',' ');
  $sq = 'create table Sticky ( SID varchar(10) not null , item varchar(100) not null , vval varchar(10000) not null , primary key( SID,item) );';
  // execute
  executeDB($dbh, $sq);
  logg('sticky table created');
} // genSticky
function getSticky($sid,$item)
{
   $dbh = getdbh();
   $sq1 = "select vval from Sticky where SID ='$sid' and item='$item';";
   $ans = readDB($dbh,$sq1);
 if (count($ans) != 0)
 {
   return( $ans[0]['vval']);
 } else {
   return ('');
 }
} // getSticky

function putSticky($sid,$item,$vval)
{
 $dbh = getdbh();
 // if sid,item exists delete it
 logg("put sticky " .  $sid . ' ' . $item . '[[' . $vval . ']]'); 
 $sq1 = "select vval from Sticky where SID ='$sid' and item='$item';";
 $ans = readDB($dbh,$sq1);
 logg('ans[0]' . $ans[0]['vval']);
 if (count($ans) !=0) { 
   logg('delete sticky -(' . $sid . '--' . $item . ")=(" . $vval . ")" );
   $sq2 = "delete from Sticky where SID ='" . $sid. "' and item ='" . $item ."'; " ;
   executeDB($dbh, $sq2);
 } // ans
 // write to db
 $sq = "insert into Sticky values ('" . $sid . "','" . $item . "','" . $vval . "' );";
 writeDB($dbh,$sq);
 logg("writedb (" . $sid . '--' . $item . ")=(" . $vval . ")" );
} // putSticky

