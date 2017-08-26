<?php 
echo "<?xml version=\"1.0\"?>";
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
session_start();
if (isset($_SESSION["UserID1"])) {
    header("location: Main.php"); 
    exit();
}
?>

<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"


if ( isset($_POST["UserID1"]) && isset($_POST["Password1"]))
 {

$UserID1 = $_POST["UserID1"]; 
$Password1 = $_POST["Password1"]; 

//Connect to MSSQL database 
date_default_timezone_set("Asia/Kolkata"); 
 $logintime = new DateTime();
  $logintime = $logintime->format('Y-m-d H:i:s');  
 //$logintime-> strlen($logintime);

   include 'services/DBConn.php';
   
   
$query = "if exists ( Select [username] ,[PriorityStatus],[password] from [Crypto_Project].[dbo].[TxUser] where [username]= '" . $UserID1 . "' and [password] = '" . $Password1 . "' )
   select [PriorityStatus],[username],[password] from [Crypto_Project].[dbo].[TxUser] where [username]= '" . $UserID1 . "' and [password] = '" . $Password1 . "'   
   else 
   select 2,0 ;  
";
//print $query;
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
                 echo  "<PriorityStatus>$fld[$i]</PriorityStatus>";
				 $priorityS =  "$fld[$i]" ;
				}
				if ($i == 1)
				{
                
				 echo  "<username>$fld[$i]</username>";
				 $user =  "$fld[$i]" ;
				}
				if ($i == 2)
				{
                
				 echo  "<password>$fld[$i]</password>";
				 $passphrase =  "$fld[$i]" ;
				}
				
				 }
				 
				echo "</row>";
                $rs->MoveNext();
				 
				 
}
				 //move on to the next record
///close the connection and recordset objects freeing up resources
echo "</catalog>";
 
$rs->Close();  
 
  if ( $priorityS == 1  && $Password1 == $passphrase)
   { 


$_SESSION['UserID1'] = $UserID1;
$_SESSION['Password1'] = $Password1;
header("location: Main.php");
exit();

    }

	
else 
{
echo 'That information is incorrect, try again <a href="loginTx.php">Click Here</a>';
exit();
}
		
}
 
		
?>

<!DOCTYPE HTML> 
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
   <meta charset="UTF-8">
<title> Project </title>	
<link type "text/css" rel = "stylesheet" href = "css/bootstrap3.css" />
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		     <script type="text/javascript" src="js/jquery.js"></script>
		     <script src="js/bootstrap3.js"></script>
		     <script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
			<script type="text/javascript" src="js/register.js"></script>
			<script type="image" src="img/glyphicons-halflings.png"> </script>
			<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
 
<script type="text/javascript" src="js/placeholders.js"></script>
 
<script> 
/* $("#button").click(function(){
    ReadNamePriority();
	
}); */
$(document).on("click","#button",function()
        {
		 ReadNamePriority();
		});

</script>
<style>
html, body, #map-canvas 
{
height: 100%;
min-height:700px;
}
	 
html, body, #button,#new_user , #forgot_password , #change_password
{
color: #FFFFFF;
font-family:"Tohama",Georgia,Serif;
}
	  

</style>



</head>

<body>
 <form  class = "well form-inline"> 
<div class="span10 form-group" >
<label id= "ACD" style = "color: #FFFFFF;font-family:Tohama,Georgia,Serif;font-size:25px;" >Cryptography</label>
</div>

<div class = "span2 pull-right">

 
</div>
   
</form>
  <!-- Carousel
    ================================================== -->	
  
                <button class="close" data-dismiss="modal" type="button">×</button>
             
           <center><label id="ACD" style="color: #000066;font-family:Tohama,Georgia,Serif;font-size:25px;">Project Login</label> </center>
              
 
   
            
<form id="form1" class="form-horizontal" role="form" name="form1" action="loginTx.php" method="POST">                     
    <table align="center">
                   
                   <tr><td> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></td>
                   <td> <input type="text" id="UserID1" name="UserID1" class="form-control"  placeholder="Enter UserID"  required="required" title="Enter a valid UserID"> </td>
                  </tr>   
                           
		   <tr>				
							
                 <td><span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span></td>
                    <td><input type="password" id="Password1" name="Password1" class="form-control" placeholder="Enter Password" required="required" title="Minimum 8 characters required for password" autocomplete="off" class="custom"><div class="err"></div> </td>
                  </tr>
                             
	 </table><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="submit" class = "btn btn-primary" name="button" id="button" value="Log In" span-pull="center" onclick=" ReadNamePriority();" /> <br>

   
</form>
    

          <!--  </form>-->
        <!-- /.modal-content -->
     <!-- /.modal-dialog -->
   
      </form>
<!-- /.modal -->
  
  <!-- /.modal -->
 <!-- /.modal -->
 
       </div>
   
       </div>
        
  <div class = "container" > 
  <div class = "row" > 
   <div class = "span8" > 
   
	
    <div id="myCarousel" class="carousel slide">

	<!-- /.carousel -->

</div>
</div>
    

    
</div>


  <hr>
  </hr>

<footer>
 
</footer>


</body>
</html>



