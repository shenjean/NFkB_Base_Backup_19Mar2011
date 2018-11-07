<html><title>NFkB Base : Browse</title>


<head>
<link href="../views/web.css" rel="stylesheet" type="text/css">
<link href="../views/shadow.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="demo_table.css" /> 
<script type='text/javascript' src='jquery-1.3.2.min.js'></script> 
<script type='text/javascript' src='jquery.dataTables.min.js'></script> 
<script type='text/javascript'> 
	$(function() {
		redraw();
		$('#redraw').click(redraw);
	});
 
	function redraw()
	{
		var url = $('#url').val();
		$.get(url, function(data){$('#test').html(data).children().dataTable({"bStateSave": true})});
 		return(false);
	}
</script> 
</head>

<body class="text" bgcolor="DDCDB4">

<div id="shadow-container">
<div class="shadow1"><div class="shadow2"><div class="shadow3">                 
  
<div class="container">
<img src="../views/images/nfkb_banner.gif">
<table class="button">
<tr><td width="30px">&nbsp;</td>
<td width="100px">:: <a href="../index.php">Home</a> ::</td>
<td width="100px">:: <a href="browse.php">Browse</a> ::</td>
<td width="100px">:: <a href="../../blast/blast.php">BLAST</a> ::</td>
<td width="100px">:: <a href="../statistics.php">Statistics</a> ::</td>
<td width="100px">:: <a href="../contact.php">Contact</a> ::</td>
<td width="455">&nbsp;</td><tr></table>
<div id="body">
<form action="../results.php" method="post">
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
<br><br>
<hr>
<br>
<div id='container'> 
<div id='top' > 
	<form action=''> 
		<font class='header'>NFkB Base Data Browser </font> 
		<p> 
		<!------
		<a href='#' onclick='$("#url").val("table1.html");return(false)'>Example 1</a> <BR>
		------> 
		<table> 
			<tr bgcolor=#EEE8CD> 
				<td> 
				<font style=verdana size=-2 > 

<font class='small_link'>
<a href='#' onclick='$("#url").val("all.html");return(false)'>- Fields: Accession-Source Accession-Organism-Description</a> <BR></font> 
</font>
</td> 
</tr> 
</table> 
 
		<P> 
		Source Data:
		<input type="text" id='url' value="all.html" /> 
		<button id='redraw'>Reload</button> 
		</p> 
<p> 
<p> 
	</form> 
</div> 
 
<div id='test'> 
</div> 
</div>  
</body> 
</center> 

<?php include ("../views/footer.php")?>
 
 
 
 
