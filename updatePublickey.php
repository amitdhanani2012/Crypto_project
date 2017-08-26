<?php


header('Content-type: text/xml');

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";

$E = $_GET['e']; 
$N = $_GET['n'];
$PHI = $_GET['phi']; 
$CIPHER = $_GET['cipher'];

 date_default_timezone_set("America/New_York"); 
 $logintime = new DateTime();
 $logintime = $logintime->format('Y-m-d H:i:s'); 
 
include 'DBConn.php';

$query = "
 delete  from testPublicKey
insert into testPublicKey
values
 ('" . $E . "', '" . $N . "', '" . $PHI . "','" . $CIPHER. "','" . $logintime. "')
select 1
";
// print $query;

$rs = $conn->execute($query);
$num_columns = $rs->Fields->Count(); 

for ($i=0; $i < $num_columns; $i++) 
{
    $fld[$i] = $rs->Fields($i);
}

echo "<catalog>";

while (!$rs->EOF)  //carry on looping through while there are records
{
echo "<row>\n";
    for ($i=0; $i < $num_columns; $i++) 
{
	if ($i == 0)
	{
		echo "<flag>$fld[$i]</flag>";
		
	}

}

 echo "</row>";
    $rs->MoveNext(); //move on to the next record
}
	
echo "</catalog>";	



$rs = null;
$conn = null;


?>
