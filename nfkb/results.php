<html><title>NFkB Base : Search Results</title>

<?php

$keyword = $_POST["keyword"];
$field = $_POST["field"];

$link = "display.php?id=";
$count = 0;
$ncbilink = "http://www.ncbi.nlm.nih.gov/protein/";

include("control/dbconnect.php");

if ($field="all") {
$result = SQL_query("SELECT DB_ID,NR_ACC,Description,Organism FROM main WHERE DB_ID LIKE '%$keyword%' OR Class LIKE '%$keyword%' OR NR_ACC LIKE '%$keyword%' OR Description LIKE '%$keyword%' OR Organism LIKE '%$keyword%' OR Gene LIKE '%$keyword%' OR GI LIKE '%$keyword%' OR UniProt LIKE '%$keyword%'");
}

else {
$result = SQL_query("SELECT DB_ID,NR_ACC,Description,Organism FROM main WHERE $field LIKE '%$keyword%'");
}

include ("views/header.php");
include ("views/searchform.php");

$num_rows = mysql_num_rows($result);

if ($num_rows==0) {
echo "<p class='text'>Sorry, your search did not return any results. Please try again</p>";
}

else
{
echo "<font class='header'>$num_rows hits found</font><br>";

echo "<table class='table'><tr class='button' style='{font-weight: bold;}'>
<td width='90'>Accession</td><td width='50'>Source Accession</td><td width='300'>Organism</td>
<td width='500'>Description</td></tr>";

while ($row = mysql_fetch_array($result)) {

echo "<tr><td width='90'><a href=".$link.$row['DB_ID'];
echo ">".$row['DB_ID'];
echo "</a></td><td width='50'><a href=".$ncbilink.$row['NR_ACC'];
echo ">".$row['NR_ACC'];
echo"</a></td><td width='300'>".$row['Organism'];
echo "</td><td width='500'>".$row['Description'];
echo "</tr>";
$count++;
}
}

echo "</table><p class='header'>$count hits found</p>";

include ("views/footer.php");
?>

