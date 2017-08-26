<?php

//header('Content-type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";


$USN = $_GET['usnName'];

 date_default_timezone_set("America/New_York"); 
 $logintime = new DateTime();
 $logintime = $logintime->format('Y-m-d H:i:s');  
 $rand = $_GET['randNum'];
 
include 'DBConn.php';

$query = "
delete from [Crypto_Project].[dbo].[MysecretKey] where [username] = '" . $USN . "'
insert into [Crypto_Project].[dbo].[MysecretKey] values ('" . $USN . "', '" . $logintime . "','" . $rand. "')
select 1
";
print $query;
$rs = $conn->execute($query);


$num_columns = $rs->Fields->Count();

for ($i=0; $i < $num_columns; $i++) {
    $fld[$i] = $rs->Fields($i);
}	

 echo "<catalog>";          
while (!$rs->EOF)  //carry on looping through while there are record
{
echo "<row>\n";
for ($i=0; $i < $num_columns; $i++)
    {
				 if ($i == 0)
                {
                 echo  "<flag>$fld[$i]</flag>";
			//	 $existCount =  "$fld[$i]" ;
				}
				
				 }
				 
				echo "</row>";
                $rs->MoveNext();
				 
				 
}
				 //move on to the next record
///close the connection and recordset objects freeing up resources
echo "</catalog>";


$rs->Close();  


?>