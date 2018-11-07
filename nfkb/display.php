<?php

$id = $_GET["id"];

$ncbilink = "http://www.ncbi.nlm.nih.gov/protein/";
$txlink = "http://www.ncbi.nlm.nih.gov/Taxonomy/Browser/wwwtax.cgi?id=";
$pmlink ="http://www.ncbi.nlm.nih.gov/pubmed/";
$cddlink = "http://www.ncbi.nlm.nih.gov/Structure/cdd/cddsrv.cgi?uid=";
$uplink = "http://www.uniprot.org/uniprot/";
$iplinnk = "http://www.ebi.ac.uk/interpro/ISearch?mode=ipr&query=";
$qglink = "http://www.ebi.ac.uk/QuickGO/GSearch?q=";
$hgnclink = "http://www.genenames.org/data/hgnc_data.php?hgnc_id=";
$pdblink = "http://www.pdb.org/pdb/explore/explore.do?structureId=";

include("control/dbconnect.php");

$result = SQL_query("SELECT * FROM main WHERE DB_ID='$id'");
#$result2 = SQL_query("SELECT * FROM cdd WHERE DB_ID='$id'");


echo "<html><title>NFkB Base - $id</title>";

include ("views/header.php");
include ("views/searchform.php");

echo "<p class='text'>";

while ($row = mysql_fetch_array($result)) {

echo "<font class='header' style='{background-color: #EEE8CD; padding:2px 2px 0px 2px;}'>".$id;
echo "</font><p><font class='field'>Source Accession&nbsp;&nbsp;</font>".$row['NR_ACC'];
echo "<br><font class='field'>Class&nbsp;&nbsp;</font>".$row['Class'];
echo "<br><font class='field'>Description&nbsp;&nbsp;</font>".$row['Description'];
echo "<br><font class='field'>Organism&nbsp;&nbsp;</font>".$row['Organism'];
echo "<br><font class='field'>Gene&nbsp;&nbsp;</font>".$row['Gene'];
echo "<br><font class='field'>Chromosome&nbsp;&nbsp;</font>".$row['Chromosome'];
echo "<br><font class='field'>Length&nbsp;&nbsp;</font>".$row['ResLength']."&nbsp;aa";
echo "<br><font class='field'>Sequence</font>";

$sequence = $row['Sequence'];
$seq = str_split($sequence,100);

foreach ($seq as $line) {
echo "<br>".$line;
}

echo "<br><p class='header'>
This record is a duplicate of the following record(s)</p>";

$dups = $row['Duplicate'];

if ($dups==null) {
echo "No duplicates found!";
}

else {
$dparray = preg_split ("/,/", $dups, -1);

foreach ($dparray as $dup) {

echo "<a href=".$ncbilink.$dup;
echo ">".$dup;
echo"</a>&nbsp;&nbsp;";

}
}


echo "<br><p class='header'><u>Cross-links</u></p>";

echo "<p><font class='field'>NCBI&nbsp;&nbsp;</font>";
echo "<a href=".$ncbilink.$row['NR_ACC'];
echo ">".$row['NR_ACC'];
echo "</a> (GI:".$row['GI'];
echo ")";

echo "<br><font class='field'>UniProt&nbsp; &nbsp;</font>";
echo "<a href=".$uplink.$row['UniProt'];
echo ">".$row['UniProt'];
echo "</a>";

echo "<br><font class='field'>QuickGO&nbsp; &nbsp;</font>";
echo "<a href=".$qglink.$row['UniProt'];
echo ">".$row['UniProt'];
echo "</a>";

echo "<br><font class='field'>HGNC&nbsp;&nbsp;</font><a href=".$hgnclink.$row['HGNC'];
echo ">".$row['HGNC'];
echo "</a>";

echo "<br><font class='field'>InterPro&nbsp; &nbsp;</font>";

$ips = $row['InterPro'];
$iparray = preg_split ("/,/", $ips, -1);

foreach ($iparray as $ip) {

echo "<a href=".$iplink.$ip;
echo ">".$ip;
echo "</a>&nbsp; &nbsp;";

}

echo "<br><font class='field'>PDB&nbsp; &nbsp;</font>";

$pdbs = $row['PDB'];
$pdbarray = preg_split ("/,/", $pdbs, -1);

foreach ($pdbarray as $pdb) {

echo "<a href=".$pdblink.$pdb;
echo ">".$pdb;
echo "</a>&nbsp; &nbsp;";

}

echo "<br><font class='field'>PMID&nbsp;&nbsp;</font>";
$pmids = $row['PMID'];
$pmarray = preg_split ("/,/", $pmids, -1);

foreach ($pmarray as $pmid) {

echo "<a href=".$pmlink.$pmid;
echo ">".$pmid;
echo "</a>&nbsp; &nbsp;";

}

echo "<br><font class='field'>TaxonID&nbsp;&nbsp;</font><a href=".$txlink.$row['TaxonID'];
echo ">".$row['TaxonID'];
echo "</a>";

# Not in database yet
# echo "<p><font class='header'><u>Sequence Features</u></font>";

while ($row2 = mysql_fetch_array($result2)) {
echo "<p><font class='field'>Range&nbsp; &nbsp;</font>".$row2['Range'];
echo "<br><font class='field'>Region Name&nbsp; &nbsp;</font>".$row2['Region'];
echo "<br><font class='field'>CDD ID&nbsp; &nbsp;</font>".$row2['Cdd_Id'];

}

}
echo "</td></tr></table>";

include ("views/footer.php");
?>

