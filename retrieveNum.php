<?php
header('Content-type: text/xml');

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";

include 'DBConn.php';
$RET = $_GET['retrieveUname'];

$query = " 
SET NOCOUNT ON
SELECT [SecretKey]
      FROM [Crypto_Project].[dbo].[MysecretKey] where username = '" .$RET. "'
";

//print $query; 

$rs = $conn->execute($query);

$num_columns = $rs->Fields->Count(); 
 
for ($i=0; $i < $num_columns; $i++) 
{
    $fld[$i] = $rs->Fields($i);
}

echo "<catalog>";

while (!$rs->EOF)  //carry on looping through while there are records
{

echo "<row>";

    for ($i=0; $i < $num_columns; $i++) 
{
	if ($i == 0)
	{
		echo "<Sec>$fld[$i]</Sec>";
	}
	
}
echo "</row>";
    $rs->MoveNext(); //move on to the next record
}

echo "</catalog>";


//close the connection and recordset objects freeing up resources 
$rs->Close();
$conn->Close();

$rs = null;
$conn = null;

?>

