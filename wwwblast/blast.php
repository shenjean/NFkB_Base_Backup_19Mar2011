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
<td width="100px">:: <a href="../nfkb/index.php">Home</a> ::</td>
<td width="100px">:: <a href="../nfkb/browse/browse.php">Browse</a> ::</td>
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
<td width="100"><input type="submit" value="Search" /></td>
</td></tr></table>
</form>
<br>
<i><font color="grey">Hint: Leave the search field blank to retrieve all records
</i></font>
<br><br><hr>
<table cellpadding="40"><tr><td>

<!--
/* $Id: blast.html,v 1.4 2003/05/22 16:20:45 dondosha Exp $
* ===========================================================================
*
*                            PUBLIC DOMAIN NOTICE
*               National Center for Biotechnology Information
*
*  This software/database is a "United States Government Work" under the
*  terms of the United States Copyright Act.  It was written as part of
*  the author's official duties as a United States Government employee and
*  thus cannot be copyrighted.  This software/database is freely available
*  to the public for use. The National Library of Medicine and the U.S.
*  Government have not placed any restriction on its use or reproduction.
*
*  Although all reasonable efforts have been taken to ensure the accuracy
*  and reliability of the software and data, the NLM and the U.S.
*  Government do not and cannot warrant the performance or results that
*  may be obtained by using this software or data. The NLM and the U.S.
*  Government disclaim all warranties, express or implied, including
*  warranties of performance, merchantability or fitness for any particular
*  purpose.
*
*  Please cite the author in any work or product based on this material.
*
* ===========================================================================
*
* File Name:  $RCSfile: blast.html,v $
*
* Author:  Sergei Shavirin
*
* Initial Version Creation Date: 03/14/2000
*
* $Revision: 1.4 $
*
* File Description:
*         Template for standalone BLAST Web page
*
* $Log: blast.html,v $
* Revision 1.4  2003/05/22 16:20:45  dondosha
* Removed references to blast_form.map: describe the map inside HTML
*
* Revision 1.3  2003/05/09 17:54:38  dondosha
* Added select menu for database genetic codes
*
* Revision 1.2  2003/05/05 18:14:02  dondosha
* Uncommented discontiguous megablast options; added subsequence options
*
* Revision 1.1  2002/08/06 19:03:51  dondosha
* WWW BLAST server, initial CVS revision
*

-->
<HTML>
<TITLE>BLAST Search </TITLE>
<BODY BGCOLOR="#FFFFFF" LINK="#0000FF" VLINK="#660099" ALINK="#660099">
<map name=img_map>
<area shape=rect coords=2,1,48,21 href="http://www.ncbi.nlm.nih.gov">
<area shape=rect coords=385,1,435,21 href="index.html">
<area shape=rect coords=436,1,486,21 href="http://www.ncbi.nlm.nih.gov/Entrez/">
<area shape=rect coords=487,1,508,21 href="docs/blast_help.html">
</map>
<img USEMAP=#img_map WIDTH=509 HEIGHT=22 SRC="images/blast_form.gif" ISMAP> 

<FORM ACTION="blast.cgi" METHOD = POST NAME="MainBlastForm" ENCTYPE= "multipart/form-data">
<B>Choose program to use and database to search:</B>
<P>
<a href="docs/blast_program.html">Program</a>
<select name = "PROGRAM">
    <option> blastn 
    <option> blastp 
    <option> blastx 
    <option> tblastn 
    <option> tblastx 
</select>
<a href="docs/blast_databases.html">Database</a>
<select name = "DATALIB">
    <option>all
    <option>crel
    <option>dorsal
    <option>dif
    <option>nfkb1
    <option>nfkb2
    <option>rela
    <option>relb
    <option>relish
</select>

<!--
Enter here your input data as 
<select name = "INPUT_TYPE"> 
    <option> Sequence in FASTA format 
    <option> Accession or GI 
</select>
-->

<P>
Enter sequence below in <a href="docs/fasta.html">FASTA</a>  format 
<BR>
<textarea name="SEQUENCE" rows=6 cols=60>
</textarea>
<BR>
Or load it from disk 
<INPUT TYPE="file" NAME="SEQFILE">
<P>
Set subsequence: From
&nbsp;&nbsp<input TYPE="text" NAME="QUERY_FROM" VALUE="" SIZE="10">
&nbsp;&nbsp&nbsp;&nbsp To
<input TYPE="text" NAME="QUERY_TO" VALUE="" SIZE="10">
<P>
<INPUT TYPE="button" VALUE="Clear sequence" onClick="MainBlastForm.SEQUENCE.value='';MainBlastForm.QUERY_FROM.value='';MainBlastForm.QUERY_TO.value='';MainBlastForm.SEQUENCE.focus();">
<INPUT TYPE="submit" VALUE="Search">
<HR>

The query sequence is 
<a href="docs/filtered.html">filtered</a> 
for low complexity regions by default.
<BR>
<a href="docs/newoptions.html#filter">Filter</a>
 <INPUT TYPE="checkbox" VALUE="L" NAME="FILTER" CHECKED> Low complexity
 <INPUT TYPE="checkbox" VALUE="m" NAME="FILTER"> Mask for lookup table only
<P>
<a href="docs/newoptions.html#expect">Expect</a>
<select name = "EXPECT">
    <option> 0.0001 
    <option> 0.01 
    <option> 1 
    <option selected> 10 
    <option> 100 
    <option> 1000 
</select>
&nbsp;&nbsp;

<a href="docs/matrix_info.html">Matrix</a>
<select name = "MAT_PARAM">
    <option value = "PAM30	 9	 1"> PAM30 </option>
    <option value = "PAM70	 10	 1"> PAM70 </option> 
    <option value = "BLOSUM80	 10	 1"> BLOSUM80 </option>
    <option selected value = "BLOSUM62	 11	 1"> BLOSUM62 </option>
    <option value = "BLOSUM45	 14	 2"> BLOSUM45 </option>
</select>
<INPUT TYPE="checkbox" NAME="UNGAPPED_ALIGNMENT" VALUE="is_set"> Perform ungapped alignment 
<P>
<a href="docs/newoptions.html#gencodes">Query Genetic Codes (blastx only) 
</a>
<select name = "GENETIC_CODE">
 <option> Standard (1) 
 <option> Vertebrate Mitochondrial (2) 
 <option> Yeast Mitochondrial (3) 
 <option> Mold Mitochondrial; ... (4) 
 <option> Invertebrate Mitochondrial (5) 
 <option> Ciliate Nuclear; ... (6) 
 <option> Echinoderm Mitochondrial (9) 
 <option> Euplotid Nuclear (10) 
 <option> Bacterial (11) 
 <option> Alternative Yeast Nuclear (12) 
 <option> Ascidian Mitochondrial (13) 
 <option> Flatworm Mitochondrial (14) 
 <option> Blepharisma Macronuclear (15) 
</select>
<P>
<a href="docs/newoptions.html#gencodes">Database Genetic Codes (tblast[nx] only)
</a>
<select name = "DB_GENETIC_CODE">
 <option> Standard (1)
 <option> Vertebrate Mitochondrial (2)
 <option> Yeast Mitochondrial (3)
 <option> Mold Mitochondrial; ... (4)
 <option> Invertebrate Mitochondrial (5)
 <option> Ciliate Nuclear; ... (6)
 <option> Echinoderm Mitochondrial (9)
 <option> Euplotid Nuclear (10)
 <option> Bacterial (11)
 <option> Alternative Yeast Nuclear (12)
 <option> Ascidian Mitochondrial (13)
 <option> Flatworm Mitochondrial (14)
 <option> Blepharisma Macronuclear (15)
</select>
<P>
<a href="docs/oof_notation.html">Frame shift penalty</a> for blastx 
<select NAME = "OOF_ALIGN"> 
 <option> 6
 <option> 7
 <option> 8
 <option> 9
 <option> 10
 <option> 11
 <option> 12
 <option> 13
 <option> 14
 <option> 15
 <option> 16
 <option> 17
 <option> 18
 <option> 19
 <option> 20
 <option> 25   
 <option> 30
 <option> 50
 <option> 1000
 <option selected VALUE = "0"> No OOF
</select>
<P>
<a href="docs/full_options.html">Other advanced options:</a> 
&nbsp;&nbsp;&nbsp;&nbsp; 
<INPUT TYPE="text" NAME="OTHER_ADVANCED" VALUE="" MAXLENGTH="50">
<HR>
<!--
<INPUT TYPE="checkbox" NAME="NCBI_GI" >&nbsp;&nbsp;
<a href="docs/newoptions.html#ncbi-gi"> NCBI-gi</a>
&nbsp;&nbsp;&nbsp;&nbsp;
-->
<INPUT TYPE="checkbox" NAME="OVERVIEW"  CHECKED> 

<a href="docs/newoptions.html#graphical-overview">Graphical Overview</a>
&nbsp;&nbsp;
<a href="docs/options.html#alignmentviews">Alignment view</a>
<select name = "ALIGNMENT_VIEW">
    <option value=0> Pairwise
    <option value=1> master-slave with identities
    <option value=2> master-slave without identities
    <option value=3> flat master-slave with identities
    <option value=4> flat master-slave without identities
    <option value=7> BLAST XML
    <option value=9> Hit Table
</select>
<BR>
<a href="docs/newoptions.html#descriptions">Descriptions</a>
<select name = "DESCRIPTIONS">
    <option> 0 
    <option> 10 
    <option> 50 
    <option selected> 100 
    <option> 250 
    <option> 500 
</select>
&nbsp;&nbsp;
<a href="docs/newoptions.html#alignments">Alignments</a>
<select name = "ALIGNMENTS">
    <option> 0 
    <option> 10 
    <option selected> 50 
    <option> 100 
    <option> 250 
    <option> 500 
</select>
<a href="docs/color_schema.html">Color schema</a>
<select name = "COLOR_SCHEMA">
    <option selected value = 0> No color schema 
    <option value = 1> Color schema 1 
    <option value = 2> Color schema 2  
    <option value = 3> Color schema 3 
    <option value = 4> Color schema 4 
    <option value = 5> Color schema 5 
    <option value = 6> Color schema 6 
</select>
<P>
<INPUT TYPE="button" VALUE="Clear sequence" onClick="MainBlastForm.SEQUENCE.value='';MainBlastForm.SEQFILE.value='';MainBlastForm.SEQUENCE.focus();">
<INPUT TYPE="submit" VALUE="Search">
</FORM>
<HR>
<ADDRESS>
Comments and suggestions to:&lt; <a href="mailto:blast-help@ncbi.nlm.nih.gov">blast-help@ncbi.nlm.nih.gov</a> &gt
</ADDRESS>
<BR>
<!-- Created: Thu Mar 16 16:41:05 EST 2000 -->
<!-- hhmts start -->
Last modified: Jan 11, 2002
<!-- hhmts end -->
</td></tr></table>

<?php include ("/root/Desktop/htdocs/nfkb/views/footer.php")?>

