<?php 
//$config['sess_expire_on_close'] = TRUE; 
//session_set_cookie_params(0);
//ini_set('session_cookie_lifetime',  0);
session_start();

$UserID=$_SESSION["UserID1"];
if (!isset($_SESSION["UserID1"]))
{
    header("location: loginTx.php"); 
    exit();
}

?>

		<html>
		<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="UTF-8">
		<title> Project </title>	
	  <link type "text/css" rel = "stylesheet" href = "css/bootstrap3.css" />
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	  <link type="text/css" rel = "stylesheet" href = "css/crypto.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/bootstrap3.js"></script>
<script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    
    <script type="image" src="img/glyphicons-halflings.png"> </script>
    <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
 
	<script type="text/javascript" src="js/placeholders.js"></script>
    <script type="text/javascript" src=""></script>
	
      <script src="js/crypto.js"></script>
	  <script src="http://peterolson.github.com/BigInteger.js/BigInteger.min.js"></script>
	  
	  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAkmkwAKK2mFltoDLr2zvjtjpILVvtgIA0&callback"></script>
	  <script>
		 $(function()
	       {
	        
	        google.maps.event.addDomListener(window, 'load', initialize);
	    	
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
<?php
//session_start();
 $UserID1=$_SESSION["UserID1"];
 echo "<font color='Black'>Welcome $UserID1!</font>";
?>
<label class="pull-right" > 
<!-- Trigger/Open The Modal -->
<button id ="mysecret" class="btn btn-info" onclick="mySecretKey();" value= "">Generate my secret Key!</button>
<button id="myBtn" class="btn btn-info">See Requests!</button>

		<!-- The Modal -->
		<div id="myModal" class="modal" width="500">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <div class="modal-header">
                 <button id="closeBox" class="close" data-dismiss="modal" type="button">×</button>
                <img border="0" src="img/key.jpg" alt="symbolimage" width="30" height="30" align="left">
                <center><label id="ACD" style="color: #000066;font-family:Tohama,Georgia,Serif;font-size:25px;">See Random Request Numbers from user!  <p>Prime p = 502121 </p> <p> Generator g = 221257</p></label> </center>
             </div>
			 <p font color= "Blue">My Approvals<input type="text" id="sendusername" name ="sendusername" class = "form-control" value="<?php echo $UserID1 ?>"  ></p>
			  <p><select name="userReq" class="form-control" id="userReq" required="required" >				
                </select> </p>
			
			<div id="secret"> </div>
			<!--  <form action="Upload.php" method="post" enctype="multipart/form-data">
            <input type="file" class = "btn btn-info" name="file" id="file"><input type="submit" class = "btn btn-info" name="submit" id="submit" value="Upload Data!"/>
			</form> -->
            </div>
			
		  </div>

</div>
<button id="encrypt" class="btn btn-info">Encrypt!</button>

<div id="modal2" class="modal" width="500">
	<div class="modal-content">
		    <div class="modal-header">
                 <button id="closeBox" class="close" data-dismiss="modal" type="button">×</button>
                <img border="0" src="img/key.jpg" alt="symbolimage" width="30" height="30" align="left">
                <center><label id="ACD" style="color: #000066;font-family:Tohama,Georgia,Serif;font-size:25px;">Send Key (g^yx mod p)!</label> </center>
             </div>
			 
		<table border="1" style="font-family:Georgia, Garamond, Serif;color:blue;font-style:italic;">
		<!--	<tr><td>e</td><td>N</td><td>φ</td><td>Encrypted Request Number</td><tr>
			<tr>
			<td><input type="text" id="eVal" name ="eVal" class = "form-control"> </td>
			<td><input type="text" id="nVal" name ="nVal" class = "form-control"></td>
			<td><input type="text" id="phiVal" name ="phiVal" class = "form-control"></td>
			<td><input type="text" id="cryptVal" name ="cryptVal" class = "form-control"></td>
			</tr>
			-->
		</table>
		<input type="submit" class = "btn btn-info" name="submitTable" id="submitTable" value="Send Encrypted Number!"/>
			 </div>
</div>
<a id ="Logout"  class ="font_color"  href="logout.php"  >Logout</a> 
<?php 

?>
 </label>
 <div id="googleMap" style="width:100%;height:530px;">
    </div>
 <script>
	// Get the modal
var modal = document.getElementById('myModal');
var mod = document.getElementById('modal2');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("encrypt");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    mod.style.display = "block";
}


$( ".close" ).click(function() {
     modal.style.display = "none";
	 mod.style.display = "none";
	 	$("#secret").hide();
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
$("#encrypt").click(function(){
retrieveSecret();
});
$( "#myBtn" ).click(function() {
	 reqUserDrpdwn(); 
	});
$("#submitTable").click(function() {
   //updatePublicKey();
   publicKey();
  // retrieveSecret();
});


 </script>
 </body>
</html>