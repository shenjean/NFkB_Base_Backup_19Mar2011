<?php
//require_once (dirname(__FILE__).'/../dbconf.php');
//require_once (dirname(__FILE__).'/../timeconf.php');

define('__DEBUG__',0 ); 
// change to 0 when in production mode otherwise 1 to see detailed error

// set up database connection
$dbh = @mysql_connect ("localhost", "root", "bioslax") or die ("Failed
to connect to database. Please try again.");
if( !$dbh )
{ header ("Location: ".WWW_HOME); }
else
{ mysql_select_db (nfkb, $dbh); }



// database functions
function SQL_query($sql, $err='error in executing SQL')
{
global $dbh;

if(__DEBUG__)
{
$result = mysql_query($sql, $dbh ) or die("<p>DB error : $err
-->".mysql_error()."</p>");

}
else
{
$result = @mysql_query($sql, $dbh ) or die("<p>DB error : $err</p>");
}

if( !$result )
{
if(__DEBUG__)
{
die('Result error : ' . mysql_error() . "\n");
}
else
{
die("<p>DB result error : $err</p>");
}
}

return($result);

}

?>


