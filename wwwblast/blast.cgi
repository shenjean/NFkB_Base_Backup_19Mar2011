#!/bin/csh -f

#
# $Id: blast.cgi,v 1.1 2002/08/06 19:03:51 dondosha Exp $
#

echo "Content-type: text/html"

cat <<!
<html><title>NFkB Base : BLAST</title>

<head>
<link href="../nfkb/views/web.css" rel="stylesheet" type="text/css">
<link href="../nfkb/views/shadow.css" rel="stylesheet" type="text/css">
</head>

<body class="text" bgcolor="DDCDB4">

<div id="shadow-container">
<div class="shadow1"><div class="shadow2"><div class="shadow3">

<div class="container">
<img src="../nfkb/views/images/nfkb_banner.gif">
<table class="button">
<tr><td width="30px">&nbsp;</td>
<td width="100px">::<a href="../nfkb/index.php">Home</a> ::</td>
<td width="100px">::<a href="../nfkb/browse/browse.php">Browse</a> ::</td>
<td width="100px">:: <a href="blast.php">BLAST</a> ::</td>
<td width="100px">:: <a href="../nfkb/statistics.php">Statistics</a> ::</td>
<td width="100px">:: <a href="../nfkb/download.php">Download</a> ::</td>
<td width="100px">:: <a href="../nfkb/contact.php">Contact</a> ::</td>

<td width="455">&nbsp;</td><tr></table>

<div id="body">
<form action="../nfkb/results.php" method="post">
<table align="left" cellspacing="0">
<tr><td width="90" class="header">Search for:</td>
<td width="170"><input type="text" name="keyword"/></td>
<td width="20" class="header">in&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="170">
<select name="field">
<option value="all">All fields</option>
<option value="DB_ID">NFkB Base Accession</option>
<option value="NR_ACC">Source DB Accession</option>
<option value="gi">gi number</option>
<option value="Description">Protein Description</option>
<option value="Gene">Gene Name</option>
<option value="Organism">Organism</option>
</select>
<td width="100"><input type="submit" value="Search" /></td></tr></table>
</form>
<br>
<i><font color="grey">Hint: Leave the search field blank to retrieve all records
</i></font>
<br><br><hr>

<table cellpadding="40"><tr><td>
!


echo ""

#setenv DEBUG_COMMAND_LINE TRUE
setenv BLASTDB db

./blast.REAL | sed 's/^[A-Z 0-9]\{4,6\}_[0-9]\{5\}/<a href="http:\/\/bioslax01.bic.nus.edu.sg\/nfkb\/display.php?id=&">&<\/a>/g' | sed 's/>[A-Z 0-9]\{4,6\}_[0-9]\{5\}/><a href="http:\/\/bioslax01.bic.nus.edu.sg\/nfkb\/display.php?id=&"&<\/a>/g' | sed 's/id=>/id=/g'   


cat <<!
</td></tr></table>

</div>
</div></div></div>
<table class="table"><tr><td width="700">
This page is best viewed with <a href="http://www.mozilla.com">Mozilla Firefox</a> 
and <a href="http://www.google.com/chrome>Google Chrome
</td><td>Last updated: 19 Mar 2011</tr></table></div></div>
</html>
!
